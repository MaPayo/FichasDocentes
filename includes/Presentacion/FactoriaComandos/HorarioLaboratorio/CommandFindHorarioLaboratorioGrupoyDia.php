<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindHorarioLaboratorioGrupoyDia implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioLaboratorio = $factorySA->createSAHorarioLaboratorio();
        $horarioLaboratorio = $saHorarioLaboratorio->findHorarioLaboratorioGrupoyDia($data);
        $responseContext = null;
        if (isset($horarioLaboratorio)) {
            $responseContext = new Context(FIND_HORARIO_LABORATORIO_GRUPO_DIA_OK, $horarioLaboratorio);
        } else {
            $responseContext = new Context(FIND_HORARIO_LABORATORIO_GRUPO_DIA_FAIL, null);
        }
        return $responseContext;
    }
}