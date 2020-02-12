<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindUsuario implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saUsuario = $factorySA->createSAUsuario();
        $usuario = $saUsuario->findUsuario($data);
        $responseContext = null;
        if ($usuario) {
            $responseContext = new Context(FIND_USUARIO_OK, $usuario);
        } else {
            $responseContext = new Context(FIND_USUARIO_FAIL, null);
        }
        return $responseContext;
    }
}
