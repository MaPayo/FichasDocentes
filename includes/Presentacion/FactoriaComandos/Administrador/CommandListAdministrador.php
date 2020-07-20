<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListAdministrador implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->listAdministrador($data);
        $responseContext = null;
        if ($administrador != null) {
            $responseContext = new Context(LIST_ADMINISTRADOR_OK, $administrador);
        } else {
            $responseContext = new Context(LIST_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
    }
}
