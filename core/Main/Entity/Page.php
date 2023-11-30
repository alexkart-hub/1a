<?php

namespace Core\Main\Entity;

use Core\Main\Controller;
use Core\Main\Entity\Script\JsScript;
use Core\Main\Entity\Script\ScriptList;
use Core\Main\Model;
use Core\Main\View;

abstract class Page
{
    protected string $pageName = '';
    protected array $scripts = [];

    public function __construct(
        public ?Model $model,
        public ?View $view,
        public ?Controller $controller,
        public ?ScriptList $scriptList
    ) {
        $this->init();
    }

    public function view()
    {
        $template = $this->view->getTemplate();
        require $this->view->getLaiout();
    }

    public function showJsScripts(): void
    {
        $this->scriptList->show();
    }

    public function getName(): string
    {
        return $this->pageName;
    }

    public function getRequest()
    {
        return $this->controller->getRequest();
    }

    protected function init(): void
    {
        $this->setPageScripts();
        $this->initScripts();
    }

    protected function initScripts(): void
    {
        foreach ($this->scripts as $script) {
            $this
                ->scriptList
                ->addItem(
                    new JsScript($this->getScriptSrc($script[0], 'template'), $script[1] ?? 100)
                );
        }
        $this->scriptList->addItem(new JsScript($this->getScriptSrc('/script.js')));
    }

    protected function getScriptSrc($script, $type = 'custom')
    {
        return TEMPLATE_URL . '/js/' . $type . $script;
    }

    protected function setPageScripts(): void
    {
        $filePath = TEMPLATE_PATH . '/settings/scripts/' . $this->pageName . '.php';
        if (file_exists($filePath)) {
            $scripts = include $filePath;
            if (is_array($scripts)) {
                $this->scripts = $scripts;
            }
        }
    }
}