<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindModEvaluacion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saEvaluacion = $factorySA->createSAModEvaluacion();
        $evaluacion = $saEvaluacion->findModEvaluacion($data);
        $responseContext = null;
        if (isset($evaluacion )) {
            $responseContext = new Context(FIND_MODEVALUACION_OK, $evaluacion);
        } else {
            $responseContext = new Context(FIND_MODEVALUACION_FAIL, null);
        }
        return $responseContext;
    }
}
