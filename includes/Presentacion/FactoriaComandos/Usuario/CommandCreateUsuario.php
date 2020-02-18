<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

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
