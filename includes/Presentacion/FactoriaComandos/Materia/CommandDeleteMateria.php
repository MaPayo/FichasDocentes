<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteMateria implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMateria = $factorySA->createSAMateria();
        $delete = $saMateria->deleteMateria($data);
        $responseContext = null;
        if ($delete) {
            $responseContext = new Context(DELETE_MATERIA_OK, null);
        } else {
            $responseContext = new Context(DELETE_MATERIA_FAIL, null);
        }
        return $responseContext;
    }
}
