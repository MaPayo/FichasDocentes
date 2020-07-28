<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModHorarioClase implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioClase = $factorySA->createSAModHorarioClase();
        $horarioClase = $saHorarioClase->listModHorarioClase($data);
        $responseContext = null;
        if (isset($horarioClase)) {
            $responseContext = new Context(LIST_MODHORARIO_CLASE_OK, $horarioClase);
        } else {
            $responseContext = new Context(LIST_MODHORARIO_CLASE_FAIL, null);
        }
        return $responseContext;
    }
}