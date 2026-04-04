<?php

namespace app\resources\widgets\forms\fileField;

use framework\web\widgets\Widget;
use app\resources\widgets\forms\activeForm\ActiveFormContext;
use framework\web\blaze\interfaces\RootContext;

class FileField extends Widget
{
    public string $name;
    public string $label;

    public function run(RootContext $ctx)
    {
        $model = $ctx->find(ActiveFormContext::class);

        if (empty($model)) {
            return $this->renderPartial('file-field', [
                'name' => $this->name,
                'label' => $this->label,
            ]);
        }
        return $this->renderPartial('active-file-field', [
            'model' => $model->model,
            'name' => $this->name,
            'label' => $this->label,
        ]);
    }
}