<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindExamenes implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saExamenes = $factorySA->createSAExamenes();
        $examenes = $saExamenes->findExamenes($data);
        $responseContext = null;
        if ($examenes) {
            $responseContext = new Context(FIND_EXAMENES_OK, $examenes);
        } else {
            $responseContext = new Context(FIND_EXAMENES_FAIL, null);
        }
        return $responseContext;
    }
}
