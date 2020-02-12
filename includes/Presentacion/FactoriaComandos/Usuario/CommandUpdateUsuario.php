<?php

namespace es\ucm;

include "Event.php";

class CommandUpdateUsuario implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saUsuario = $factorySA->createSAUsuario();
        $usuario = $saUsuario->updateUsuario($data);
        $responseContext = null;
        if ($usuario) {
            $responseContext = new Context(UPDATE_USUARIO_OK, $usuario);
        } else {
            $responseContext = new Context(UPDATE_USUARIO_FAIL, null);
        }
        return $responseContext;
    }
}
