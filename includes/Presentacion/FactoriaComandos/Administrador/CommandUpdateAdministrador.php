<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateAdministrador implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->updateAdministrador($data);
        $responseContext = null;
        if ($administrador != null) {
            $responseContext = new Context(UPDATE_ADMINISTRADOR_OK, $administrador);
        } else {
            $responseContext = new Context(UPDATE_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
    }
}
