<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindPermisosPorProfesorYAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPermisos = $factorySA->createSAPermisos();
        $email = $data['email'];
        $asignatura = $data['asignatura'];
        $permisos = $saPermisos->findPermisosPorProfesorYAsignatura($email, $asignatura);
        $responseContext = null;
        if ($permisos) {
            $responseContext = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_OK, $permisos);
        } else {
            $responseContext = new Context(FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
