class TrackedScope {
  constructor(obj = {}) {
    // Store the original object
    this._data = obj;

    // Store dependencies as: { propName: Set of dependent keys/functions }
    this._dependencies = new Map();

    // Flag for the currently running component or function
    this._current = null;

    // Create the proxy
    this.state = this._createProxy(this._data);
  }

  _createProxy(target, path = '') {
    return new Proxy(target, {
      get: (obj, prop) => {
        if (typeof prop === 'string') {
          const fullPath = path ? `${path}.${prop}` : prop;

          // Track dependency if there is a current function/component running
          if (this._current) {
            if (!this._dependencies.has(fullPath)) {
              this._dependencies.set(fullPath, new Set());
            }
            this._dependencies.get(fullPath).add(this._current);
          }

          const value = obj[prop];

          // If value is an object, wrap it with proxy too (for dot notation)
          if (value && typeof value === 'object') {
            return this._createProxy(value, fullPath);
          }

          return value;
        }

        return obj[prop];
      },

      set: (obj, prop, value) => {
        obj[prop] = value;
        return true;
      }
    });
  }

  // Run a function/component and mark it as current
  run(fn, key) {
    this._current = key;
    fn(this.state);
    this._current = null;
  }

  // Get dependencies for a property
  getDependencies(prop) {
    return this._dependencies.get(prop) ? Array.from(this._dependencies.get(prop)) : [];
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
        this.bindModels();
        this.bindText();
    },
    findScope(el) {
        while (!el.hasAttribute('data-scope')) {
            el = el.parentNode;
        }

        return el.getAttribute('data-scope-name');
    },
    bindScopes() {
        const scopes = document.querySelectorAll('[data-scope]');

        for (let scope of scopes) {
            let result = scope.getAttribute('data-scope');
            let i = result.indexOf(':');
            let pieces = [result.slice(0,i), result.slice(i+1)];
            this.scopes[pieces[0]] = new TrackedScope(eval(`(${pieces[1]})`));
            scope.setAttribute('data-scope-name', pieces[0]);
        }
    },
    bindModels() {
        const models = document.querySelectorAll('[data-bind]');

        for (let model of models) {
            let scope = this.findScope(model);
            model.addEventListener('change', this.change(model.getAttribute('data-bind'), scope).bind(this));
            model.addEventListener('keyup', this.change(model.getAttribute('data-bind'), scope).bind(this));
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
            let scope = this.findScope(el);
            // Initial run to deduce dependencies
            const ev = new Function(scope, "return " + el.getAttribute('data-text'));

            let data = this.scopes[scope];
            data.run(ev, id);

            el.innerText = ev(data.state);
        }
    },
    change(field, scope) {
        return function onChange(e) {
            const newVal = e.currentTarget.value;

            this.scopes[scope].state[field] = newVal;

            this.refresh(field, scope);
        }
    },
    refresh(field, scope) {
        let data = this.scopes[scope];

        let deps = data.getDependencies(field);

        for (let dep of deps) {
            let el = document.getElementById(dep);
            const ev = new Function(scope, "return " + el.getAttribute('data-text'));

            el.innerText = ev(data.state);
        }
    }
}

// Initialize the code
window.Tiny.init();