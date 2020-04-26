<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModHorarioLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioLaboratorio = $factorySA->createSAModHorarioLaboratorio();
        $horarioLaboratorio = $saHorarioLaboratorio->listModHorarioLaboratorio($data);
        $responseContext = null;
        if ($horarioLaboratorio) {
            $responseContext = new Context(LIST_MODHORARIO_LABORATORIO_OK, $horarioLaboratorio);
        } else {
            $responseContext = new Context(LIST_MODHORARIO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}