# Widget System in TinyPHP

The Widget system is a core feature of TinyPHP, enabling rapid UI development through reusable, self-contained components.

## Overview

A widget in TinyPHP consists of:
1. **The Widget Class**: Handles logic and data (`src/app/assets/widgets/.../WidgetName.php`).
2. **The Partial View**: The HTML template for the widget (`src/app/assets/widgets/.../widget_name.html.php`).
3. **Assets**: Optional CSS and JS files that are automatically loaded when the widget is used.

## Using Widgets in Views

TinyPHP provides a custom tag syntax for rendering widgets.

```html
<Namespace.Widget attribute="value" />
```

For example, to render a `Card` widget from the `Ui` namespace:

```html
<Ui.Card color="primary">
    <h3>Card Title</h3>
    <p>This is the card content.</p>
</Ui.Card>
```

- **Namespace**: The directory under `src/app/assets/widgets/`.
- **Widget**: The folder name (e.g., `card`) and class name (e.g., `Card.php`).
- **Attributes**: Passed as properties to the widget class.
- **Inner Content**: Passed to the widget via the `$content` variable.

## Creating a Widget

### 1. The Widget Class

Create your widget class in `src/app/assets/widgets/namespace/name/Name.php`:

```php
namespace app\assets\widgets\ui\card;

use framework\web\widgets\Widget;

class Card extends Widget {
    // Properties match tag attributes
    public $color = 'white';
    
    public function run() {
        return $this->renderPartial('card', [
            'content' => $this->content,
            'colorClass' => $this->color == 'primary' ? 'bg-indigo-600' : 'bg-white'
        ]);
    }
}
```

### 2. The Partial View

Create the template in the same directory (`card.html.php`):

```html
<div class="rounded-xl shadow-lg p-6 {{ $colorClass }}">
    {{!! $content !!}}
</div>
```

## Automatic Asset Management

Widgets can declare their own CSS and JS dependencies. When a widget is rendered, TinyPHP automatically registers these assets, and they are injected into the layout's header or footer via the `AssetManager`.

```php
class MyWidget extends Widget {
    public $css = ['widgets/my-widget.css'];
    public $js = ['widgets/my-widget.js'];
    
    // ...
}
```

---
Next: [Interactive UI with TinyJS](reactivity.md)
