<?php

namespace Core\Main\Entity;

use Core\Main\Model;
use Core\Main\View;

abstract class Page
{
    public function __construct(
        public ?Model $model,
        public ?View $view
    ) {}
}