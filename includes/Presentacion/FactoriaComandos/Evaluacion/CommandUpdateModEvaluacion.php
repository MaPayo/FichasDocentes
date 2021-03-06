<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateModEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAModEvaluacion();
        $evaluacion = $saEvaluacion->updateModEvaluacion($data);
        $responseContext = null;
        if ($evaluacion != null) {
            $responseContext = new Context(UPDATE_MODEVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(UPDATE_MODEVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}
