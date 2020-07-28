<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindProblema implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProblema = $factorySA->createSAProblema();
        $problema = $saProblema->findProblema($data);
        $responseContext = null;
        if (isset($problema)) {
            $responseContext = new Context(FIND_PROBLEMA_OK, $problema);
        } else {
            $responseContext = new Context(FIND_PROBLEMA_FAIL, null);
        }
        return $responseContext;
    }
}
