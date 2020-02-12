<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteModMetodologia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAModMetodologia();
        $metodologia = $saMetodologia->deleteModMetodologia($data);
        $responseContext = null;
        if ($metodologia) {
            $responseContext = new Context(DELETE_MODMETODOLOGIA_OK, $metodologia);
        } else {
            $responseContext = new Context(DELETE_MODMETODOLOGIA_FAIL, null);
        }
        return $responseContext;
    }
}
