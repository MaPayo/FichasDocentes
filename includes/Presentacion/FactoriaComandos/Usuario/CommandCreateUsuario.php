<?php

namespace es\ucm;

include "Event.php";

class CommandCreateUsuario implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saUsuario = $factorySA->createSAUsuario();
        $usuario = $saUsuario->createUsuario($data);
        $responseContext = null;
        if ($usuario) {
            $responseContext = new Context(CREATE_USUARIO_OK, $usuario);
        } else {
            $responseContext = new Context(CREATE_USUARIO_FAIL, null);
        }
        return $responseContext;
    }
}
