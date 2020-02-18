<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateAdministrador implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->createAdministrador($data);
        $responseContext = null;
        if ($administrador != null) {
            $responseContext = new Context(CREATE_ADMINISTRADOR_OK, $administrador);
        } else {
            $responseContext = new Context(CREATE_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
    }
}
