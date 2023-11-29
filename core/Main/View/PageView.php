<?php

namespace Core\Main\View;

use Core\Main\View;

abstract class PageView extends View
{
    public function getTemplate()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/app/template/default/templates/' . $this->template . '.php';
    }

    public function getLaiout()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/app/template/default/layout.php';
    }
}