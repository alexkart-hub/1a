<?php

namespace Core\Main\Controller\Page;

use Core\Main\Controller\PageController;

class MainPageController extends PageController
{
    public function index()
    {
        $this->page->view->show();
    }
}