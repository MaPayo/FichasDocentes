<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModulo implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saModulo = $factorySA->createSAModulo();
        $modulo = $saModulo->createModulo($data);
        $responseContext = null;
        if ($modulo != null) {
            $responseContext = new Context(CREATE_MODULO_OK, $modulo);
        } else {
            $responseContext = new Context(CREATE_MODULO_FAIL, null);
        }
        return $responseContext;
    }
}
