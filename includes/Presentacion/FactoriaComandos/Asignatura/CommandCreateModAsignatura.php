<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAModAsignatura();
        $asignatura = $saAsignatura->createModAsignatura($data);
        $responseContext = null;
        if ($asignatura != null) {
            $responseContext = new Context(CREATE_MODASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(CREATE_MODASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
