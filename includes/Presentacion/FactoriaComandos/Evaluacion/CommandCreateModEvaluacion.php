<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandCreateModEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAModEvaluacion();
        $evaluacion = $saEvaluacion->createModEvaluacion($data);
        $responseContext = null;
        if ($evaluacion != null) {
            $responseContext = new Context(CREATE_MODEVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(CREATE_MODEVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}