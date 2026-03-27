<?php

namespace app\resources\widgets\forms\activeForm;

use framework\blaze\interfaces\RootContext;
use framework\web\models\Model;
use framework\web\widgets\Widget;

class ActiveForm extends Widget
{
    public Model $model;
    public string $action;
    public string $method = 'POST';

    public function begin(RootContext $ctx)
    {
        $ctx->push(new ActiveFormContext($this->model, $this));
    }

    public function run($ctx)
    {
        return $this->renderPartial('active-form', [
            'model' => $this->model,
            'action' => $this->action,
            'content' => $this->content,
            'method' => $this->method,
        ]);
    }

    public function end(RootContext $ctx)
    {
        $ctx->pop();
    }
}