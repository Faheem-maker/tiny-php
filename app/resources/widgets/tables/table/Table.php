<?php

namespace app\resources\widgets\tables\table;

use framework\web\blaze\interfaces\RootContext;
use framework\web\widgets\Widget;

class Table extends Widget
{
    public function run(RootContext $ctx)
    {
        return $this->renderPartial('table', [
            'content' => $this->content,
        ]);
    }
}