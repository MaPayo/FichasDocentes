<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateModAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAMODAsignatura();
        $asignatura = $saAsignatura->updateModAsignatura($data);
        $responseContext = null;
        if ($asignatura != null) {
            $responseContext = new Context(UPDATE_MODASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(UPDATE_MODASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
