class TrackedScope {
  constructor(obj = {}) {
    // Store the original object
    this._data = obj;

    // Store dependencies as: { propName: Set of dependent keys/functions }
    this._dependencies = new Map();

    // Store effects as: { propName: Set of dependent keys/functions }
    this._effects = new Map();

    // Flag for the currently running component or function
    this._current = null;

    // Create the proxy
    this.state = this._createProxy(this._data);
  }

  _createProxy(target, path = '') {
    return new Proxy(target, {
      get: (obj, prop, receiver) => {
        if (typeof prop === 'string') {

          const fullPath = path ? `${path}.${prop}` : prop;

          if (this._current) {
            if (!this._dependencies.has(fullPath)) {
              this._dependencies.set(fullPath, new Set());
            }
            this._dependencies.get(fullPath).add(this._current);
          }

          const value = Reflect.get(obj, prop, receiver);

          if (value && typeof value === 'object') {
            return this._createProxy(value, fullPath);
          }

          return value;
        }

        return Reflect.get(obj, prop, receiver);
      },

      set: (obj, prop, value) => {
        const fullPath = path ? `${path}.${prop}` : prop;

        if (this._current) {
          if (!this._effects.has(this._current)) {
            this._effects.set(this._current, new Set());
          }
          this._effects.get(this._current).add(fullPath);
        }
        obj[prop] = value;
        return true;
      }
    });
  }

  // Run a function/component and mark it as current
  run(fn, key) {
    this._current = key;
    let tmp = fn(this.state);
    this._current = null;

    return tmp;
  }

  // Get dependencies for a property
  getDependencies(prop) {
    return this._dependencies.get(prop) ? Array.from(this._dependencies.get(prop)) : [];
  }

  dependenciesFor(key) {
    return this._effects.get(key) ? Array.from(this._effects.get(key)) : [];
  }

  addDependency(field, key) {
    if (!this._dependencies.has(field)) {
      this._dependencies.set(field, new Set());
    }
    this._dependencies.get(field).add(key);
  }
}

window.Tiny = {
  controllers: {},
  scopes: {},
  evals: {},
  controller(name, cls) {
    this.controllers[name] = cls;
  },
  init() {
    this.bindScopes();
    this.bindControllers();
    this.bindModels();
    this.bindText();
    this.bindListeners();
  },
  findScope(el) {
    while (!el.hasAttribute('data-scope')) {
      el = el.parentNode;
    }

    return el.getAttribute('data-scope-name');
  },
  findModel(el) {
    while (!el.hasAttribute('data-scope') && !el.hasAttribute('data-controller')) {
      el = el.parentNode;
    }

    let name = el.getAttribute('data-scope-name');
    if (name != null) {
      return {
        name,
        value: this.scopes[name],
      }
    }
    else {
      name = el.getAttribute('data-controller-name');
      return {
        name,
        value: this.controllers[name],
      };
    }
  },
  bindScopes() {
    const scopes = document.querySelectorAll('[data-scope]');

    for (let scope of scopes) {
      let result = scope.getAttribute('data-scope');
      let i = result.indexOf(':');
      let pieces = [result.slice(0, i), result.slice(i + 1)];
      this.scopes[pieces[0]] = new TrackedScope(eval(`(${pieces[1]})`));
      scope.setAttribute('data-scope-name', pieces[0]);
    }
  },
  bindControllers() {
    const controllers = document.querySelectorAll('[data-controller]');

    for (let controller of controllers) {
      let result = controller.getAttribute('data-controller');
      let i = result.indexOf(':');
      let pieces = [result.slice(0, i), result.slice(i + 1)];
      this.controllers[pieces[0]] = new TrackedScope(new (eval(pieces[1]))());
      controller.setAttribute('data-controller-name', pieces[0]);
    }
  },
  bindModels() {
    const models = document.querySelectorAll('[data-bind]');

    for (let model of models) {
      let scope = this.findModel(model);
      model.addEventListener('change', this.change(model.getAttribute('data-bind'), scope).bind(this));
      model.addEventListener('keyup', this.change(model.getAttribute('data-bind'), scope).bind(this));

      // Mark dependencies
      let id = model.getAttribute('id');
      if (id == null) {
        id = crypto.randomUUID();
        model.setAttribute('id', id);
      }

      scope.value.addDependency(model.getAttribute('data-bind'), id);
    }
  },
  bindText() {
    const els = document.querySelectorAll('[data-text]');

    for (let el of els) {
      let id = el.getAttribute('id');
      if (id == null) {
        id = crypto.randomUUID();
        el.setAttribute('id', id);
      }
      let scope = this.findModel(el);
      // Initial run to deduce dependencies
      const ev = new Function(scope.name, "return " + el.getAttribute('data-text'));

      el.innerText = scope.value.run(ev, id);
    }
  },
  bindListeners() {
    const els = document.querySelectorAll('[data-onclick]');

    for (let el of els) {
      let id = el.getAttribute('id');
      if (id == null) {
        id = crypto.randomUUID();
        el.setAttribute('id', id);
      }
      let scope = this.findModel(el);
      // Build and attach an event listener
      let fn = this.buildListener('click', el, scope);
      el.addEventListener('click', fn);
    }
  },
  buildListener(ev, el, scope) {
    let fn = new Function(scope.name, el.getAttribute(`data-on${ev}`));
    let first = true;

    return () => {
      scope.value.run(fn, first ? el.getAttribute('id') : null);

      first = true;

      // Refresh all dependencies
      this.refreshFor(el.getAttribute('id'), scope);
    };
  },
  change(field, scope) {
    return function onChange(e) {
      const newVal = e.currentTarget.value;

      scope.value.state[field] = newVal;

      this.refresh(field, scope);
    }
  },
  refresh(field, scope) {
    let deps = scope.value.getDependencies(field);

    for (let dep of deps) {
      let el = document.getElementById(dep);
      let ev = new Function(scope.name, "return " + el.getAttribute('data-text'));

      if (el.getAttribute('data-bind')) {
        ev = new Function(scope.name, "return " + scope.name + "." + el.getAttribute('data-bind'));
      }

      if (el.value != null) {
        el.value = scope.value.run(ev);
      }
      else {
        el.innerText = scope.value.run(ev);
      }
    }
  },
  refreshFor(key, scope) {
    let deps = scope.value.dependenciesFor(key);

    for (let dep of deps) {
      this.refresh(dep, scope);
    }
  },
}

// Initialize the code
window.Tiny.init();