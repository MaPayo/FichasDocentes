<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateMetodologia implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAMetodologia();
        $metodologia = $saMetodologia->createMetodologia($data);
        $responseContext = null;
        if ($metodologia) {
            $responseContext = new Context(CREATE_METODOLOGIA_OK, $metodologia);
        } else {
            $responseContext = new Context(CREATE_METODOLOGIA_FAIL, null);
        }
        return $responseContext;
    }
}
