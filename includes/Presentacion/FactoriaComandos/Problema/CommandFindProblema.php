<?php

namespace es\ucm;

include "Event.php";

class CommandFindProblema implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProblema = $factorySA->createSAProblema();
        $problema = $saProblema->findProblema($data);
        $responseContext = null;
        if ($problema) {
            $responseContext = new Context(FIND_PROBLEMAS_OK, $problema);
        } else {
            $responseContext = new Context(FIND_PROBLEMAS_FAIL, null);
        }
        return $responseContext;
    }
}
