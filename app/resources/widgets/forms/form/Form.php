<?php

namespace app\resources\widgets\forms\form;

use framework\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Form extends Widget
{
    public string $action;
    public string $method = 'POST';

    public function run($ctx)
    {
        return $this->renderPartial('form', [
            'action' => $this->action,
            'content' => $this->content,
            'method' => $this->method,
        ]);
    }
}