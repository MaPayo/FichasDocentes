<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAEvaluacion();
        $evaluacion = $saEvaluacion->updateEvaluacion($data);
        $responseContext = null;
        if ($evaluacion != null) {
            $responseContext = new Context(UPDATE_EVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(UPDATE_EVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}
