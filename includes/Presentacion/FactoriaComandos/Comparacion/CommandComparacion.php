<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandComparacion implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $sa = $factorySA->createSAComparacion();
        $comparacion = $sa->comparacion($data);
        $responseContext = null;
        if ($comparacion != null) {
            $responseContext = new Context(COMPARACION_OK, $comparacion);
        } else {
            $responseContext = new Context(COMPARACION_FAIL, null);
        }
        return $responseContext;
    }
}
