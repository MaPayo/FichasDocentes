<?php

namespace es\ucm;

include "Event.php";

class CommandFindModProgramaAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAModProgramaAsignatura();
        $programa = $saPrograma->findModProgramaAsignatura($data);
        $responseContext = null;
        if ($programa) {
            $responseContext = new Context(FIND_MODPROGRAMA_ASIGNATURA_OK, $programa);
        } else {
            $responseContext = new Context(FIND_MODPROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
