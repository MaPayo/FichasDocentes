<?php

namespace es\ucm;

include "Event.php";

class CommandCreateProfesor implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProfesor = $factorySA->createSAProfesor();
        $profesor = $saProfesor->createProfesor($data);
        $responseContext = null;
        if ($profesor) {
            $responseContext = new Context(CREATE_PROFESOR_OK, $profesor);
        } else {
            $responseContext = new Context(CREATE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
