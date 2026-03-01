# Controllers in TinyPHP

Controllers handle the application logic for specific routes. They are located in `src/app/http/controllers`.

## Creating a Controller

A TinyPHP controller is a simple PHP class. It doesn't need to extend any base class unless you want to share logic across multiple controllers.

```php
namespace app\http\controllers;

class TextController {
    /**
     * Action method for the counter tool
     */
    public function counter() {
        // Business logic goes here (e.g., fetching data)
        
        // Return a view response
        return view('text.counter');
    }
}
```

## Action Methods

Any public method in a controller can be used as an action. Traditionally, action methods should return a `ViewResponse` (via the `view()` helper) or a string.

### Returning Views

The `view($path, $data = [])` global helper creates a `ViewResponse` object.

- `$path`: The dot-notation path to the view file (e.g., `'text.counter'` refers to `src/app/assets/views/text/counter.html.php`).
- `$data`: An optional associative array of variables to pass to the view.

```php
return view('profile.show', ['user' => $userData]);
```

## Dependency Injection and Components

Controllers can access framework components directly from the `Application` instance:

```php
use framework\Application;

$config = Application::get()->config;
$assets = Application::get()->assets;
```

These components are typically registered during the bootstrap process.

---
Next: [Explore Views & Templating](views.md)
