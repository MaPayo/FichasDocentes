<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateGrado implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrado = $factorySA->createSAGrado();
        $grado = $saGrado->updateGrado($data);
        $responseContext = null;
        if ($grado) {
            $responseContext = new Context(UPDATE_GRADO_OK, $grado);
        } else {
            $responseContext = new Context(UPDATE_GRADO_FAIL, null);
        }
        return $responseContext;
    }
}
