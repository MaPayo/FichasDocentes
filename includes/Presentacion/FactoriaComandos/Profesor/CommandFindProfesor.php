<?php

namespace es\ucm;

include "Event.php";

class CommandFindProfesor implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProfesor = $factorySA->createSAProfesor();
        $profesor = $saProfesor->findProfesor($data);
        $responseContext = null;
        if ($profesor) {
            $responseContext = new Context(FIND_PROFESOR_OK, $profesor);
        } else {
            $responseContext = new Context(FIND_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
