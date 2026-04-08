<?php

namespace app\resources\widgets\tables\body;

use framework\web\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Body extends Widget
{
    public function run(RootContext $ctx)
    {
        return $this->renderPartial('body', [
            'content' => $this->content,
        ]);
    }
}