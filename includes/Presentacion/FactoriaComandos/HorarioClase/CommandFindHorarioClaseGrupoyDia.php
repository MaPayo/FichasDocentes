<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindHorarioClaseGrupoyDia implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saHorarioClase = $factorySA->createSAHorarioClase();
        $horarioClase = $saHorarioClase->findHorarioClaseGrupoyDia($data);
        $responseContext = null;
        if (isset($horarioClase)) {
            $responseContext = new Context(FIND_HORARIO_CLASE_GRUPO_DIA_OK, $horarioClase);
        } else {
            $responseContext = new Context(FIND_HORARIO_CLASE_GRUPO_DIA_FAIL, null);
        }
        return $responseContext;
    }
}