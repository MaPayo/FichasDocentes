<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindProfesor implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProfesor = $factorySA->createSAProfesor();
        $profesor = $saProfesor->findProfesor($data);
        $responseContext = null;
        if ($profesor) {
            $responseContext = new Context(FIND_PROFESOR_OK, $profesor);
        } else {
            $responseContext = new Context(FIND_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
