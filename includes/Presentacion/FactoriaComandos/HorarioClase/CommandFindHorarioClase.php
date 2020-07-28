<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindHorarioClase implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioClase = $factorySA->createSAHorarioClase();
        $horarioClase = $saHorarioClase->findHorarioClase($data);
        $responseContext = null;
        if (isset($horarioClase)) {
            $responseContext = new Context(FIND_HORARIO_CLASE_OK, $horarioClase);
        } else {
            $responseContext = new Context(FIND_HORARIO_CLASE_FAIL, null);
        }
        return $responseContext;
    }
}