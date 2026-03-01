# Getting Started with TinyPHP

Welcome to TinyPHP! This guide will help you set up a simple project and understand the basic workflow.

## Installation

TinyPHP is designed to be lightweight. To get started, you can clone the repository and set up a local PHP environment (like XAMPP or Laragon).

1. **Clone the repo** to your local web server directory (e.g., `htdocs`).
2. **Configure your Virtual Host** or use the default server at `localhost/your-project/src`.
3. **Verify the installation** by navigating to `http://localhost/your-project/src/index.php`.

## Directory Structure

A typical TinyPHP project follows this structure:

- `src/app`: Your application logic and assets.
  - `assets/views`: Your template files (`.html.php`).
  - `assets/widgets`: Your reusable UI components.
  - `config`: Configuration files for routes, services, and URLs.
  - `http/controllers`: Your PHP controllers.
- `src/framework`: The core TinyPHP engine (don't modify this).
- `src/public`: Publicly accessible files (CSS, JS, Images).

## Creating Your First Page

### 1. Define a Route

Open `src/app/config/routes.php` and add a new route:

```php
use app\http\controllers\HomeController;
use framework\web\Routes;

Routes::get('/', [HomeController::class, 'index']);
```

### 2. Create a Controller

Create `src/app/http/controllers/HomeController.php`:

```php
namespace app\http\controllers;

class HomeController {
    public function index() {
        return view('home.index', ['name' => 'World']);
    }
}
```

### 3. Create a View

Create `src/app/assets/views/home/index.html.php`:

```html
<h1>Hello, {{ $name }}!</h1>
<p>Welcome to your first TinyPHP application.</p>
```

### 4. Run it!

Navigate to the root URL of your project in your browser. You should see "Hello, World!".

## Next Steps

- Explore [Routing](routing.md) in more detail.
- Learn how to use [Widgets](widgets.md) for faster UI development.
- Add interactivity with [TinyJS](reactivity.md).
