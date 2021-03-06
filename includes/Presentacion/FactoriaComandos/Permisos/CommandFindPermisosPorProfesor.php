<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindPermisosPorProfesor implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPermisos = $factorySA->createSAPermisos();
        $permisos = $saPermisos->findPermisosPorProfesor($data);
        $responseContext = null;
        if (isset($permisos)) {
            $responseContext = new Context(FIND_PERMISOS_POR_PROFESOR_OK, $permisos);
        } else {
            $responseContext = new Context(FIND_PERMISOS_POR_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
