<?php

namespace Core\Main\Controller\Page;

use Core\Main\Controller\PageController;

class Page404Controller extends PageController
{
    public function index($url = '')
    {
        if ($url !== '/404') {
            header('http/1.1 404 Not Found');
        }
       parent::index();
    }
}