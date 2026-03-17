<?php

namespace app\assets\widgets\forms\hiddenField;

use framework\web\widgets\Widget;
use app\assets\widgets\forms\activeForm\ActiveFormContext;
use framework\blaze\interfaces\RootContext;

class HiddenField extends Widget {
    public string $name;
    public bool $readonly = false;

    public function run(RootContext $ctx) {
        $model = $ctx->find(ActiveFormContext::class);

        if (empty($model)) {
            return $this->renderPartial('text-field');
        }
        return $this->renderPartial('active-hiddenfield', [
            'model' => $model->model,
            'name' => $this->name,
            'readonly' => $this->readonly,
        ]);
    }
}