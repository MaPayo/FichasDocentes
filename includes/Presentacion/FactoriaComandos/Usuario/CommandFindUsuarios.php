<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindUsuarios implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saUsuario = $factorySA->createSAUsuario();
        $usuario = $saUsuario->findUsuarios();
        $responseContext = null;
        if (isset($usuario)) {
            $responseContext = new Context(FIND_USUARIOS_OK, $usuario);
        } else {
            $responseContext = new Context(FIND_USUARIOS_FAIL, null);
        }
        return $responseContext;
    }
}
