<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateTeorico implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saTeorico = $factorySA->createSATeorico();
        $teorico = $saTeorico->createTeorico($data);
        $responseContext = null;
        if ($teorico) {
            $responseContext = new Context(CREATE_TEORICO_OK, $teorico);
        } else {
            $responseContext = new Context(CREATE_TEORICO_FAIL, null);
        }
        return $responseContext;
    }
}
