<?php

namespace Core\Main\Entity\Script;

use Core\Main\Entity\Script;

class ScriptList
{
    private array $items = [];

    public function addItem(Script $item)
    {
        $this->items[] = $item;
    }

    public function show()
    {
        $scriptString = '';
        /** @var Script $item */
        usort($this->items, fn($item1, $item2) => $item1->sort <=> $item2->sort);
        foreach ($this->items as $item) {
            $scriptString .= $item->getHtml();
        }
        echo $scriptString;
    }
}