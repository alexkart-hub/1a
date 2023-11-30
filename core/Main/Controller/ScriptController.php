<?php

namespace Core\Main\Controller;

use Core\Main\Entity\Script;
use Core\Main\Entity\Script\ScriptList;

class ScriptController extends \Core\Main\Controller
{
    private ScriptList $scripts;

    public function show()
    {
        return $this->scripts;
    }

    public function addScript(Script $script)
    {
        $this->scripts->addItem($script);
    }
}