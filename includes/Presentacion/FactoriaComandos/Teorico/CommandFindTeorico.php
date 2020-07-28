<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindTeorico implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saTeorico = $factorySA->createSATeorico();
        $teorico = $saTeorico->findTeorico($data);
        $responseContext = null;
        if (isset($teorico)) {
            $responseContext = new Context(FIND_TEORICO_OK, $teorico);
        } else {
            $responseContext = new Context(FIND_TEORICO_FAIL, null);
        }
        return $responseContext;
    }
}
