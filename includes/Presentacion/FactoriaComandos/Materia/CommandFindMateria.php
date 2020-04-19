<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindMateria implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMateria = $factorySA->createSAMateria();
        $materia = $saMateria->findMateria($data);
        $responseContext = null;
        if ($materia != null) {
            $responseContext = new Context(FIND_MATERIA_OK, $materia);
        } else {
            $responseContext = new Context(FIND_MATERIA_FAIL, null);
        }
        return $responseContext;
    }
}
