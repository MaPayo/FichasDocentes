<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListGrado implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrado = $factorySA->createSAGrado();
        $grado = $saGrado->listGrado();
        $responseContext = null;
        if ($grado) {
            $responseContext = new Context(LIST_GRADO_OK, $grado);
        } else {
            $responseContext = new Context(LIST_GRADO_FAIL, null);
        }
        return $responseContext;
    }
}
