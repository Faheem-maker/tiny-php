<?php

namespace app\resources\widgets\layout\row;

use framework\web\widgets\Widget;

class Row extends Widget
{
    public int $cols = 2;
    public int $cols_md = 4;

    public function run($ctx)
    {
        return $this->renderPartial('row', [
            'content' => $this->content,
            'cols' => $this->cols,
            'cols_md' => $this->cols_md,
        ]);
    }
}