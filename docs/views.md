# Views & Templating in TinyPHP

TinyPHP uses a custom template engine that provides a "Blade-like" syntax while remaining lightweight and fast. Views are stored in `src/app/assets/views` with the `.html.php` extension.

## View Syntax

### Variables & Escaping

You can echo data using double curly braces. TinyPHP automatically escapes the output to prevent XSS.

```html
<p>Hello, {{ $userName }}</p>
```

#### Unsafe Echo

If you need to echo raw HTML or pre-rendered content, use the `{{!! ... !!}}` syntax.

```html
<div class="content">
    {{!! $renderedHtml !!}}
</div>
```

### Layouts

TinyPHP supports template inheritance via the `@layout` directive.

```php
@layout('layouts.main', [
    'title' => 'Page Title'
])

<h1>This is the main content</h1>
```

The content of your view is injected into the `@layout` file where the `{{!! $content !!}}` variable is placed.

### PHP Blocks

For logic that doesn't fit into directives, you can use the `@{ ... }` block to execute arbitrary PHP code.

```php
@{
    $app->assets->addScript('/js/custom-tool.js');
}
```

### Control Structures

TinyPHP supports common control structures using `@` directives.

#### If Statements

```php
@if($isLoggedIn)
    <p>Welcome back!</p>
@endif
```

## Rendering Widgets

One of the most powerful features of TinyPHP views is the ability to render widgets using a custom tag syntax.

```html
<Ui.Card color="primary">
    <p>This content is inside a card widget!</p>
</Ui.Card>
```

Detailed information on the widget system can be found in the [Widgets Documentation](widgets.md).

## View Compilation

When a view is requested for the first time or when it is modified, the `ViewCompiler` translates it into standard PHP and caches the result in `src/app/runtime/views`. This ensures high performance for subsequent requests.

---
Next: [Understanding the Widget System](widgets.md)
