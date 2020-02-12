<?php

namespace es\ucm;

include "Event.php";

class CommandFindLeyenda implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saLeyenda = $factorySA->createSALeyenda();
        $leyenda = $saLeyenda->findLeyenda($data);
        $responseContext = null;
        if ($leyenda) {
            $responseContext = new Context(FIND_LEYENDA_OK, $leyenda);
        } else {
            $responseContext = new Context(FIND_LEYENDA_FAIL, null);
        }
        return $responseContext;
    }
}
