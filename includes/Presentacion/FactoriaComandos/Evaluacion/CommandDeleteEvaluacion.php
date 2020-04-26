<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandDeleteEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAEvaluacion();
        $evaluacion = $saEvaluacion->deleteEvaluacion($data);
        $responseContext = null;
        if ($evaluacion != null) {
            $responseContext = new Context(DELETE_EVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(DELETE_EVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}