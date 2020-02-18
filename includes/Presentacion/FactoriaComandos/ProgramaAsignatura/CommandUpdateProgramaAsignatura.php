<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateProgramaAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAProgramaAsignatura();
        $programa = $saPrograma->updateProgramaAsignatura($data);
        $responseContext = null;
        if ($programa) {
            $responseContext = new Context(UPDATE_PROGRAMA_ASIGNATURA_OK, $programa);
        } else {
            $responseContext = new Context(UPDATE_PROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
