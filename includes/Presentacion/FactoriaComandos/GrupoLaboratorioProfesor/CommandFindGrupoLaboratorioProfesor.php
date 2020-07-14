<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindGrupoLaboratorioProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorioProfesor = $factorySA->createSAGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $saGrupoLaboratorioProfesor->findGrupoLaboratorioProfesor($data['idGrupoLaboratorio'], $data['emailProfesor']);
        $responseContext = null;
        if ($grupoLaboratorioProfesor) {
            $responseContext = new Context(FIND_GRUPO_LABORATORIO_PROFESOR_OK, $grupoLaboratorioProfesor);
        } else {
            $responseContext = new Context(FIND_GRUPO_LABORATORIO_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}
