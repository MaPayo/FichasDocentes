<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModBibliografia implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSAModBibliografia();
        $bibliografia = $saBibliografia->createModBibliografia($data);
        $responseContext = null;
        if ($bibliografia != null) {
            $responseContext = new Context(CREATE_MODBIBLIOGRAFIA_OK, $bibliografia);
        } else {
            $responseContext = new Context(CREATE_MODBIBLIOGRAFIA_FAIL, null);
        }
        return $responseContext;
    }
}
