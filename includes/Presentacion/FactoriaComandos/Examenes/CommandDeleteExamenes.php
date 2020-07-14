<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteExamenes implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saExamenes = $factorySA->createSAExamenes();
        $examenes = $saExamenes->deleteExamenes($data);
        $responseContext = null;
        if ($examenes) {
            $responseContext = new Context(DELETE_EXAMENES_OK, $examenes);
        } else {
            $responseContext = new Context(DELETE_EXAMENES_FAIL, null);
        }
        return $responseContext;
    }
}
