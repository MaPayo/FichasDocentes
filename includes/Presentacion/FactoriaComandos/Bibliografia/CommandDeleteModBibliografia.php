<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandDeleteModBibliografia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSAModBibliografia();
        $bibliografia = $saBibliografia->deleteModBibliografia($data);
        $responseContext = null;
        if ($bibliografia != null) {
            $responseContext = new Context(DELETE_MODBIBLIOGRAFIA_OK, $bibliografia);
        } else {
            $responseContext = new Context(DELETE_MODBIBLIOGRAFIA_FAIL, null);
        }
        return $responseContext;
    }
}