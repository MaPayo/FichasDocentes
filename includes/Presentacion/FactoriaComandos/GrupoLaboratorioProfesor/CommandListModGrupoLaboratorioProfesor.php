<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModGrupoLaboratorioProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorioProfesor = $factorySA->createSAModGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $saGrupoLaboratorioProfesor->listModGrupoLaboratorioProfesor($data);
        $responseContext = null;
        if (isset($grupoLaboratorioProfesor)) {
            $responseContext = new Context(LIST_MODGRUPO_LABORATORIO_PROFESOR_OK, $grupoLaboratorioProfesor);
        } else {
            $responseContext = new Context(LIST_MODGRUPO_LABORATORIO_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}