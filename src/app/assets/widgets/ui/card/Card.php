<?php

namespace app\assets\widgets\ui\card;

use framework\web\widgets\Widget;

/**
 * This widget renders a simple card
 * with an optional heading and content
 */
class Card extends Widget {
    public $color = 'white';
    public $data_scope;
    public $data_controller;
    
    public function run() {
        return $this->renderPartial('card', [
            'content' => $this->content,
            'attrs' => $this->attributes([
                'data-scope' => $this->data_scope,
                'data-controller' => $this->data_controller,
            ]),
        ]);
    }
}