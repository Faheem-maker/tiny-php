<?php

namespace app\resources\widgets\forms\textField;

use framework\web\widgets\Widget;
use app\resources\widgets\forms\activeForm\ActiveFormContext;
use framework\web\blaze\interfaces\RootContext;

class TextField extends Widget
{
    public string $name;
    public bool $readonly = false;

    public function run(RootContext $ctx)
    {
        $model = $ctx->find(ActiveFormContext::class);

        if (empty($model)) {
            return $this->renderPartial('text-field');
        }
        return $this->renderPartial('active-textfield', [
            'model' => $model->model,
            'name' => $this->name,
            'readonly' => $this->readonly,
        ]);
    }
}