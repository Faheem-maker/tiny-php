<?php

namespace app\assets\widgets\ui\flatCard;

use framework\web\widgets\Widget;

class FlatCard extends Widget{
    public $color = 'primary';

    public function run($ctx) {
        return $this->renderPartial('flat_card', [
            'content' => $this->content,
            'color' => $this->color,
        ]);
    }
}