<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteGrado implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrado = $factorySA->createSAGrado();
        $grado = $saGrado->deleteGrado($data);
        $responseContext = null;
        if ($grado) {
            $responseContext = new Context(DELETE_GRADO_OK, $grado);
        } else {
            $responseContext = new Context(DELETE_GRADO_FAIL, null);
        }
        return $responseContext;
    }
}
