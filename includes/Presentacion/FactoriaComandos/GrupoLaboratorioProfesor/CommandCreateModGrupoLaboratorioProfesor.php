<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModGrupoLaboratorioProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorioProfesor = $factorySA->createSAModGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $saGrupoLaboratorioProfesor->createModGrupoLaboratorioProfesor($data);
        $responseContext = null;
        if ($grupoLaboratorioProfesor) {
            $responseContext = new Context(CREATE_MODGRUPO_LABORATORIO_PROFESOR_OK, $grupoLaboratorioProfesor);
        } else {
            $responseContext = new Context(CREATE_MODGRUPO_LABORATORIO_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
