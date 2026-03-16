<?php

namespace app\assets\widgets\tables\header;

use framework\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Header extends Widget {
    public function run(RootContext $ctx)
    {
        return $this->renderPartial('header', [
            'content' => $this->content,
        ]);
    }
}