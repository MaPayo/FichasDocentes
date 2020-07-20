<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandCreateEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAEvaluacion();
        $evaluacion = $saEvaluacion->createEvaluacion($data);
        $responseContext = null;
        if ($evaluacion != null) {
            $responseContext = new Context(CREATE_EVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(CREATE_EVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}
