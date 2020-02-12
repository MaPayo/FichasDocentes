<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteAdministrador implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->deleteAdministrador($data);
        $responseContext = null;
        if ($administrador != null) {
            $responseContext = new Context(DELETE_ADMINISTRADOR_OK, $administrador);
        } else {
            $responseContext = new Context(DELETE_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
    }
}
