<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        $asignatura = $saAsignatura->findAsignatura($data);
        $responseContext = null;
        if ($asignatura != null) {
            $responseContext = new Context(FIND_ASIGNATURA_OK, $asignatura);
        } else {
            $responseContext = new Context(FIND_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
