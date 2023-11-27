<?php

namespace Core\Main\View;

use Core\Main\View;

abstract class PageView extends View
{
    public function show()
    {
        $template = $_SERVER['DOCUMENT_ROOT'] . '/app/template/default/templates/' . $this->template . '.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/app/template/default/layout.php';

    }
}