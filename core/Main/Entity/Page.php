<?php

namespace Core\Main\Entity;

use Core\Main\Controller;
use Core\Main\Model;
use Core\Main\View;

abstract class Page
{
    public function __construct(
        public ?Model $model,
        public ?View $view,
        public ?Controller $controller
    ) {}

    public function view()
    {
        $template = $this->view->getTemplate();
        require $this->view->getLaiout();
    }
}