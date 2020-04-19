<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteModulo implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saModulo = $factorySA->createSAModulo();
        $delete = $saModulo->deleteModulo($data);
        $responseContext = null;
        if ($delete) {
            $responseContext = new Context(DELETE_MODULO_OK, null);
        } else {
            $responseContext = new Context(DELETE_MODULO_FAIL, null);
        }
        return $responseContext;
    }
}
