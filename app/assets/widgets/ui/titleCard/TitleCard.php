<?php

namespace app\assets\widgets\ui\titleCard;

use framework\web\widgets\Widget;

class TitleCard extends Widget{
    public $color = 'primary';
    public $title = '';
    public $data_text = '';
    public $text = '';

    public function run() {
        return $this->renderPartial('title_card', [
            'color' => $this->color,
            'title' => $this->title,
            'data_text' => $this->data_text,
            'text' => $this->text,
        ]);
    }
}