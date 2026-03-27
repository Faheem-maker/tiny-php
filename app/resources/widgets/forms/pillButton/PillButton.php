<?php

namespace app\resources\widgets\forms\pillButton;

use framework\web\widgets\Widget;

class PillButton extends Widget
{
    public $id = null;
    public $data_onclick = null;
    public $variant = 'transparent';
    protected $variants = [
        'transparent' => 'text-gray-600 hover:bg-gray-100',
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-lg shadow-indigo-200',
    ];

    public function run($ctx)
    {
        return $this->renderPartial('button', [
            'content' => $this->content,
            'attrs' => $this->attributes([
                'id' => $this->id,
                'data-onclick' => $this->data_onclick,
            ]),
            'classes' => $this->variants[$this->variant],
        ]);
    }
}