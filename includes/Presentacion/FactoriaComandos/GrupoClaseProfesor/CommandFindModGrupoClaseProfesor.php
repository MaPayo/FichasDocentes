<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindModGrupoClaseProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClaseProfesor = $factorySA->createSAModGrupoClaseProfesor();
        $grupoClaseProfesor = $saGrupoClaseProfesor->findModGrupoClaseProfesor($data['idGrupoClase'], $data['emailProfesor']);
        $responseContext = null;
        if (isset($grupoClaseProfesor)) {
            $responseContext = new Context(FIND_MODGRUPO_CLASE_PROFESOR_OK, $grupoClaseProfesor);
        } else {
            $responseContext = new Context(FIND_MODGRUPO_CLASE_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
