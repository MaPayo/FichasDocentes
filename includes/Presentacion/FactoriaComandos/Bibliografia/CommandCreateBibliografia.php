<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateBibliografia implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSABibliografia();
        $bibliografia = $saBibliografia->createBibliografia($data);
        $responseContext = null;
        if ($bibliografia != null) {
            $responseContext = new Context(CREATE_BIBLIOGRAFIA_OK, $bibliografia);
        } else {
            $responseContext = new Context(CREATE_BIBLIOGRAFIA_FAIL, null);
        }
        return $responseContext;
    }
}
