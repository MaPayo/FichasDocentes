<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateExamenes implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saExamenes = $factorySA->createSAExamenes();
        $examenes = $saExamenes->updateExamenes($data);
        $responseContext = null;
        if ($examenes) {
            $responseContext = new Context(UPDATE_EXAMENES_OK, $examenes);
        } else {
            $responseContext = new Context(UPDATE_EXAMENES_FAIL, null);
        }
        return $responseContext;
    }
}
