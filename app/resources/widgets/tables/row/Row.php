<?php

namespace app\resources\widgets\tables\row;

use framework\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Row extends Widget
{
    public function run(RootContext $ctx)
    {
        return $this->renderPartial('row', [
            'content' => $this->content,
        ]);
    }
}