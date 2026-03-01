<?php

namespace app\assets\widgets\forms\textarea;

use framework\web\widgets\Widget;

class TextArea extends Widget {
    public $id = null;
    public $data_bind = null;

    public function run()
    {
        return $this->renderPartial('textarea', [
            'attrs' => $this->attributes([
                'id' => $this->id,
                'data-bind' => $this->data_bind,
            ])
        ]);
    }
}