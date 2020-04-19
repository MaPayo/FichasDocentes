<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListGrupoClaseProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClaseProfesor = $factorySA->createSAGrupoClaseProfesor();
        $grupoClaseProfesor = $saGrupoClaseProfesor->listGrupoClaseProfesor($data);
        $responseContext = null;
        if ($grupoClaseProfesor) {
            $responseContext = new Context(LIST_GRUPO_CLASE_PROFESOR_OK, $grupoClaseProfesor);
        } else {
            $responseContext = new Context(LIST_GRUPO_CLASE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}