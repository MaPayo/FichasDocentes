<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateHorarioLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioLaboratorio = $factorySA->createSAHorarioLaboratorio();
        $horarioLaboratorio = $saHorarioLaboratorio->updateHorarioLaboratorio($data);
        $responseContext = null;
        if ($horarioLaboratorio) {
            $responseContext = new Context(UPDATE_HORARIO_LABORATORIO_OK, $horarioLaboratorio);
        } else {
            $responseContext = new Context(UPDATE_HORARIO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}