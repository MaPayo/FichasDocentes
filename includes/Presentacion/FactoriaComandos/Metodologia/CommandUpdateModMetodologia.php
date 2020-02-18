<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateModMetodologia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAModMetodologia();
        $metodologia = $saMetodologia->updateModMetodologia($data);
        $responseContext = null;
        if ($metodologia) {
            $responseContext = new Context(UPDATE_MODMETODOLOGIA_OK, $metodologia);
        } else {
            $responseContext = new Context(UPDATE_MODMETODOLOGIA_FAIL, null);
        }
        return $responseContext;
    }
}
