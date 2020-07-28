<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindModGrupoLaboratorioProfesor implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorioProfesor = $factorySA->createSAModGrupoLaboratorioProfesor();
        $grupoLaboratorioProfesor = $saGrupoLaboratorioProfesor->findModGrupoLaboratorioProfesor($data['idGrupoLaboratorio'],$data['emailProfesor']);
        $responseContext = null;
        if (isset($grupoLaboratorioProfesor)) {
            $responseContext = new Context(FIND_MODGRUPO_LABORATORIO_PROFESOR_OK, $grupoLaboratorioProfesor);
        } else {
            $responseContext = new Context(FIND_MODGRUPO_LABORATORIO_PROFESOR_FAIL, null);
        }
        return $responseContext;
    }
}