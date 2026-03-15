<?php

namespace app\assets\widgets\layout\flex;

use framework\web\widgets\Widget;

class Flex extends Widget {
    public $justify = 'start';

    public function run($ctx) {
        return $this->renderPartial('flex', [
            'content' => $this->content,
            'justify' => 'justify-' . $this->justify,
        ]);
    }
}