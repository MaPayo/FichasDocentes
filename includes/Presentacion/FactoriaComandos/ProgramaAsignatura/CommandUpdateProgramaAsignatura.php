<?php

namespace es\ucm;

include "Event.php";

class CommandUpdateProgramaAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAProgramaAsignatura();
        $programa = $saPrograma->updateProgramaAsignatura($data);
        $responseContext = null;
        if ($programa) {
            $responseContext = new Context(UPDATE_PROGRAMA_ASIGNATURA_OK, $programa);
        } else {
            $responseContext = new Context(UPDATE_PROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
