<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteModGrupoClaseProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClaseProfesor = $factorySA->createSAModGrupoClaseProfesor();
        $grupoClaseProfesor = $saGrupoClaseProfesor->deleteModGrupoClaseProfesor($data['idGrupoClase'],$data['emailProfesor']);
        $responseContext = null;
        if ($grupoClaseProfesor) {
            $responseContext = new Context(DELETE_MODGRUPO_CLASE_PROFESOR_OK, $grupoClaseProfesor);
        } else {
            $responseContext = new Context(DELETE_MODGRUPO_CLASE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}