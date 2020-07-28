<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        $asignatura = $saAsignatura->listAsignatura($data);
        $responseContext = null;
        if (isset($asignatura)) {
            $responseContext = new Context(LIST_ASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(LIST_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
