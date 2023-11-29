<?php

namespace Core\Main\Controller;

use Core\Main\Controller;

abstract class PageController extends Controller
{
    protected static string $classPrefix = '';
    protected static string $class = __CLASS__;
    protected  $page;

    public function index()
    {
        $this->page->view();
    }

    protected function init()
    {
        static::$classPrefix = $this->getClassPrefix();
        $model = $this->container->get($this->getModelClass());
        $view = $this->container->get($this->getViewClass());
        $args = [
            'model' => $model ?: null,
            'view'  => $view ?: null,
            'controller' => $this
        ];
        $this->page = $this->container->setArguments($args)->get($this->getPageClass());
    }

    protected function getModelClass()
    {
        return 'Core\Main\Model\Page\\' . static::$classPrefix . 'Model';
    }

    protected function getViewClass()
    {
        return 'Core\Main\View\Page\\' . static::$classPrefix . 'View';
    }

    protected function getPageClass()
    {
        return 'Core\Main\Entity\Page\\' . static::$classPrefix;
    }

    protected function getClassPrefix(): string
    {
        $class = explode('\\', static::class);
        $className = end($class);
        return substr($className, 0, strpos($className, 'Controller'));
    }
}