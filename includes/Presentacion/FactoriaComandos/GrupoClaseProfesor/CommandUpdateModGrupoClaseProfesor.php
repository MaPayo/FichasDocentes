<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateModGrupoClaseProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClaseProfesor = $factorySA->createSAModGrupoClaseProfesor();
        $grupoClaseProfesor = $saGrupoClaseProfesor->updateModGrupoClaseProfesor($data);
        $responseContext = null;
        if ($grupoClaseProfesor) {
            $responseContext = new Context(UPDATE_MODGRUPO_CLASE_PROFESOR_OK, $grupoClaseProfesor);
        } else {
            $responseContext = new Context(UPDATE_MODGRUPO_CLASE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}