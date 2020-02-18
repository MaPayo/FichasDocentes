<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteModAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAModAsignatura();
        $delete = $saAsignatura->deleteModAsignatura($data);
        $responseContext = null;
        if ($delete) {
            $responseContext = new Context(DELETE_MODASIGNATURA_OK, null);
        } else {
            $responseContext = new Context(DELETE_MODASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
