<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModGrupoClaseProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClaseProfesor = $factorySA->createSAModGrupoClaseProfesor();
        $grupoClaseProfesor = $saGrupoClaseProfesor->listModGrupoClaseProfesor($data);
        $responseContext = null;
        if (isset($grupoClaseProfesor)) {
            $responseContext = new Context(LIST_MODGRUPO_CLASE_PROFESOR_OK, $grupoClaseProfesor);
        } else {
            $responseContext = new Context(LIST_MODGRUPO_CLASE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
