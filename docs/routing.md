# Routing in TinyPHP

TinyPHP features a simple but flexible routing system located in `src/app/config/routes.php`.

## Basic Routing

Routes are defined using the `framework\web\Routes` class. You can register routes for different HTTP methods.

```php
use framework\web\Routes;

// Basic GET route
Routes::get('/about', [AboutController::class, 'index']);

// Basic POST route (Standard implementation supports GET/POST)
// Note: Currently focused on GET for prototyping demonstrations
```

## Route Resolution

The framework resolves routes by matching the `REQUEST_URI` against the registered paths. It ignores trailing slashes automatically.

### Handling Dynamic Segments

While the current version focus is on static paths for rapid prototyping, you can handle sub-paths by creating specific route entries.

### Example: Nested Routes

```php
Routes::get('/tools/text/counter', [TextController::class, 'counter']);
Routes::get('/tools/text/analysis', [TextController::class, 'analysis']);
```

## Controllers and Actions

A route typically points to a controller class and a specific method (action) within that class.

```php
[TextController::class, 'counter']
```

- `TextController::class`: The fully qualified name of the controller.
- `'counter'`: The name of the method to execute.

## Internal Mechanism

The `EntryPoint` class in the framework takes the URL, looks up the action in the `Routes` table, and instantiates the controller to run the method. If the method returns a string or a `ViewResponse`, it is rendered to the browser.

---
Next: [Learn about Controllers](controllers.md)
