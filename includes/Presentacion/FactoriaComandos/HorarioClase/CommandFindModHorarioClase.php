<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindModHorarioClase implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioClase = $factorySA->createSAModHorarioClase();
        $horarioClase = $saHorarioClase->findModHorarioClase($data);
        $responseContext = null;
        if (isset($horarioClase)) {
            $responseContext = new Context(FIND_MODHORARIO_CLASE_OK, $horarioClase);
        } else {
            $responseContext = new Context(FIND_MODHORARIO_CLASE_FAIL, null);
        }
        return $responseContext;
    }
}