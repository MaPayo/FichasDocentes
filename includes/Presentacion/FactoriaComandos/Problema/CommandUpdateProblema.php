<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateProblema implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saProblema = $factorySA->createSAProblema();
        $problema = $saProblema->updateProblema($data);
        $responseContext = null;
        if ($problema) {
            $responseContext = new Context(UPDATE_PROBLEMA_OK, $problema);
        } else {
            $responseContext = new Context(UPDATE_PROBLEMA_FAIL, null);
        }
        return $responseContext;
    }
}
