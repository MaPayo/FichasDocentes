<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindAdministrador implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->findAdministrador($data);
        $responseContext = null;
        if (isset($administrador)) {
            $responseContext = new Context(FIND_ADMINISTRADOR_OK, $administrador);
        } else {
            $responseContext = new Context(FIND_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
    }
}
