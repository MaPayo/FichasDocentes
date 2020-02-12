<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        $delete = $saAsignatura->deleteAsignatura($data);
        $responseContext = null;
        if ($delete) {
            $responseContext = new Context(DELETE_ASIGNATURA_OK, null);
        } else {
            $responseContext = new Context(DELETE_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
