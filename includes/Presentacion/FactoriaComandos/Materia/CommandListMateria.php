<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListMateria implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMateria = $factorySA->createSAMateria();
        $materia = $saMateria->listMateria($data);
        $responseContext = null;
        if (isset($materia)) {
            $responseContext = new Context(LIST_MATERIA_OK, $materia);
        } else {
            $responseContext = new Context(LIST_MATERIA_FAIL, null);
        }
        return $responseContext;
    }
}
