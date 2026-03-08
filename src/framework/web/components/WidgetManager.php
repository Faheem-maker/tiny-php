<?php

namespace framework\web\components;

use framework\Application;
use framework\web\interfaces\Component;
use framework\web\widgets\Widget;

class WidgetManager extends Component{
    /**
     * Renders a widget and returns its
     * HTML representation as string.
     * Automatically registers any required
     * assets
     * 
     * @param string $widget Name of the widget
     * @return string Rendered widget
     */
    public function render($widget, $params, $content) {
        $segs = explode('.', $widget);

        $cls = $this->path($segs);

        // Add the class name
        $cls .= '\\' . $segs[count($segs)-1];

        $obj = new $cls();

        // Register params
        foreach ($params as $param => $value) {
            $param = str_replace('-', '_', $param);

            $obj->$param = $value;
        }

        if (!empty($content)) {
            $obj->content = $content;
        }

        // Register Assets
        $this->registerAssets($obj);

        return $obj->run();
    }

    protected function registerAssets(Widget $widget): void {
        $assets = Application::get()->assets;

        foreach ($widget->css as $css) {
            $assets->addCss($css);
        }

        foreach ($widget->js as $js) {
            $assets->addScript($js);
        }
    }

    protected function path($segments) {
        $result = '\\app\\assets\\widgets\\';

        foreach ($segments as $segment) {
            $result .= $segment . '\\';
        }

        return rtrim($result, '\\');
    }
}