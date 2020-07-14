<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateModBibliografia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSAModBibliografia();
        $bibliografia = $saBibliografia->updateModBibliografia($data);
        $responseContext = null;
        if ($bibliografia != null) {
            $responseContext = new Context(UPDATE_MODBIBLIOGRAFIA_OK, $bibliografia);
        } else {
            $responseContext = new Context(UPDATE_MODBIBLIOGRAFIA_FAIL, null);
        }
        return $responseContext;
    }
}
