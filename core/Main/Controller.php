<?php

namespace Core\Main;

abstract class Controller
{
    public function __construct(protected Container $container)
    {
        $this->init();
    }

    protected function init() {}
}