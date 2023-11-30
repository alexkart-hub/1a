<?php

namespace Core\Main;

abstract class Controller
{
    public function __construct(
        protected Container $container,
        protected Request $request
    )
    {
        $this->init();
    }

    public function getRequest()
    {
        return $this->request;
    }

    protected function init() {}
}