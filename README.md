# TinyPHP Framework

TinyPHP is a minimalist, reactive PHP framework designed for rapid prototyping of small and medium-sized applications. It combines a simple internal routing system with an installable widget pack architecture and a powerful, reactive JavaScript frontend.

## Key Features

- **Rapid Prototyping**: Build functional prototypes in hours, not days.
- **Widget Packs**: Installable, reusable UI components with automatic asset management.
- **Reactive Framework**: A built-in JavaScript engine for real-time, data-driven interfaces without complex setups.
- **Blade-like Templates**: Clean, intuitive view syntax for PHP developers.
- **Minimalistic**: Low overhead and easy to understand codebase.

## Project Structure

```text
src/
├── app/
│   ├── assets/          # Views, Widgets, JS, CSS
│   ├── config/          # Application configuration
│   ├── http/            # Controllers
│   └── runtime/         # Cached views and logs
├── framework/           # Core framework logic
├── includes/            # Autoloading and global helpers
├── public/              # Publicly accessible assets
└── index.php            # Entry point
```

## Documentation

- [Getting Started](docs/getting-started.md)
- [Routing](docs/routing.md)
- [Controllers](docs/controllers.md)
- [Views & Templating](docs/views.md)
- [Widget System](docs/widgets.md)
- [Reactive JavaScript (TinyJS)](docs/reactivity.md)

## Example Application

The `tiny-tools` implementation included in this repository serves as a live demonstration of TinyPHP's capabilities, featuring a real-time Word Counter and other utility tools.

---
*Note: TinyPHP is currently under implementation. Features demonstrated cover approximately 90% of the planned surface.*
