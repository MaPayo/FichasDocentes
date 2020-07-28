<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindModulo implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saModulo = $factorySA->createSAModulo();
        $modulo = $saModulo->findModulo($data);
        $responseContext = null;
        if (isset($modulo)) {
            $responseContext = new Context(FIND_MODULO_OK, $modulo);
        } else {
            $responseContext = new Context(FIND_MODULO_FAIL, null);
        }
        return $responseContext;
    }
}
