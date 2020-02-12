<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteProgramaAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAProgramaAsignatura();
        $programa = $saPrograma->deleteProgramaAsignatura($data);
        $responseContext = null;
        if ($programa) {
            $responseContext = new Context(DELETE_PROGRAMA_ASIGNATURA_OK, $programa);
        } else {
            $responseContext = new Context(DELETE_PROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
