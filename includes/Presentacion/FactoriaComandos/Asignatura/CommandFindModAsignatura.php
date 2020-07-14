<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindModAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAModAsignatura();
        $asignatura = $saAsignatura->findModAsignatura($data);
        $responseContext = null;
        if ($asignatura != null) {
            $responseContext = new Context(FIND_MODASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(FIND_MODASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
