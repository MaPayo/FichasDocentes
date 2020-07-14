<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateExamenes implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saExamenes = $factorySA->createSAExamenes();
        $examenes = $saExamenes->createExamenes($data);
        $responseContext = null;
        if ($examenes) {
            $responseContext = new Context(CREATE_EXAMENES_OK, $examenes);
        } else {
            $responseContext = new Context(CREATE_EXAMENES_FAIL, null);
        }
        return $responseContext;
    }
}
