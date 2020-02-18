<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeletePermisos implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPermisos = $factorySA->createSAPermisos();
        $permisos = $saPermisos->deletePermisos($data);
        $responseContext = null;
        if ($permisos) {
            $responseContext = new Context(DELETE_PERMISOS_OK, $permisos);
        } else {
            $responseContext = new Context(DELETE_PERMISOS_FAIL, null);
        }
        return $responseContext;
    }
}
