<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteModGrupoLaboratorioProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorioProfesor = $factorySA->createSAModGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $saGrupoLaboratorioProfesor->deleteModGrupoLaboratorioProfesor($data['idGrupoLaboratorio'], $data['emailProfesor']);
        $responseContext = null;
        if ($grupoLaboratorioProfesor) {
            $responseContext = new Context(DELETE_MODGRUPO_LABORATORIO_PROFESOR_OK, $grupoLaboratorioProfesor);
        } else {
            $responseContext = new Context(DELETE_MODGRUPO_LABORATORIO_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
