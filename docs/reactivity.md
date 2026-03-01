# Reactive Interactivity (TinyJS)

TinyPHP includes "TinyJS", a lightweight reactive JavaScript framework designed to make your prototypes feel alive without the complexity of modern JS build tools.

## Core Concepts

TinyJS works by tracking data dependencies in your HTML and automatically updating the DOM when that data changes.

## `data-scope`: Defining State

Use the `data-scope` attribute to define a reactive state object for a portion of your page.

```html
<div data-scope="counter: { text: 'Initial value' }">
    ... child elements ...
</div>
```

- `counter`: The name of the scope.
- `{ text: 'Initial value' }`: The initial JavaScript object representing your state.

## `data-text`: Dynamic Content

The `data-text` attribute binds an element's `innerText` to a JavaScript expression. TinyJS tracks which state properties are used in the expression and updates the element automatically.

```html
<div data-scope="counter: { count: 0 }">
    <p>Length: <span data-text="counter.count">0</span></p>
    <button onclick="Tiny.scopes.counter.state.count++">Increment</button>
</div>
```

Expressions can be complex:
```html
<span data-text="counter.text.length > 0 ? 'Has text' : 'Empty'"></span>
```

## `data-bind`: Two-Way Binding

The `data-bind` attribute creates two-way binding for form elements (inputs, textareas). When the user types, the state is updated; and when the state is changed programmatically, the input value updates.

```html
<textarea data-bind="text" placeholder="Type here..."></textarea>
```

*Note: The `data-bind` property matches a key in the current scope's state.*

## TrackedScope (The Magic Behind the Scenes)

Under the hood, TinyJS uses the `TrackedScope` class, which uses ES6 Proxies to intercept property access.

1. When an expression in `data-text` is first evaluated, TinyJS records which properties were "touched".
2. This creates a dependency map.
3. When a property is changed via the `state` proxy, TinyJS looks up all dependent elements and re-evaluates their expressions.

## Usage Example: Word Counter

The Word Counter demo uses these concepts to provide real-time updates:

```html
<div data-scope="counter: { text: '' }">
    <!-- Displays the count dynamically -->
    <span data-text="counter.text.length">0</span> Characters
    
    <!-- Input that updates the 'text' property -->
    <textarea data-bind="text"></textarea>
</div>
```

---
Return to [README](../README.md)
