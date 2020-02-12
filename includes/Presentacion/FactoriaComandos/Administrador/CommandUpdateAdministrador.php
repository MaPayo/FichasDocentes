<?php

namespace es\ucm;

include "Event.php";

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
