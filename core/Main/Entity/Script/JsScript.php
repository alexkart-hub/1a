<?php

namespace Core\Main\Entity\Script;

use Core\Main\Entity\Script;

class JsScript extends Script
{
    public function __construct(
        public string $src,
        public int $sort = 100
    ) {}

    public function getHtml(): string
    {
        return "<script src=\"{$this->src}\"></script>";
    }
}