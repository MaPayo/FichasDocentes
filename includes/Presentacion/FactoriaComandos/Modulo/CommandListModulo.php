<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModulo implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saModulo = $factorySA->createSAModulo();
        $modulo = $saModulo->listModulo($data);
        $responseContext = null;
        if ($modulo) {
            $responseContext = new Context(LIST_MODULO_OK, $modulo);
        } else {
            $responseContext = new Context(LIST_MODULO_FAIL, null);
        }
        return $responseContext;
    }
}
