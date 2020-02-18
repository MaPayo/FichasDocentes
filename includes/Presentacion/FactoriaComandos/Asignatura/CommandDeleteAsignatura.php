<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

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
