<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

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
