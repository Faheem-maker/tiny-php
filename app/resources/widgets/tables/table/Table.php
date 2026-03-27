<?php

namespace app\resources\widgets\tables\table;

use framework\blaze\interfaces\RootContext;
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