<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateBibliografia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSABibliografia();
        $bibliografia = $saBibliografia->updateBibliografia($data);
        $responseContext = null;
        if ($bibliografia != null) {
            $responseContext = new Context(UPDATE_BIBLIOGRAFIA_OK, $bibliografia);
        } else {
            $responseContext = new Context(UPDATE_BIBLIOGRAFIA_FAIL, null);
        }
        return $responseContext;
    }
}
