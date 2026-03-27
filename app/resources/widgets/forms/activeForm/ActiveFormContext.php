<?php

namespace app\resources\widgets\forms\activeForm;

use framework\web\models\Model;

class ActiveFormContext
{
    public Model $model;
    public ActiveForm $form;

    public function __construct(Model $model, ActiveForm $form)
    {
        $this->model = $model;
        $this->form = $form;
    }
}