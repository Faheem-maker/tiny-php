<?php

namespace app\resources\widgets\tables\header;

use framework\web\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Header extends Widget
{
    public function run(RootContext $ctx)
    {
        return $this->renderPartial('header', [
            'content' => $this->content,
        ]);
    }
}