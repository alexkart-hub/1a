<?php

namespace Core\Main\Entity;

abstract class Script
{
    abstract public function getHtml(): string;
}