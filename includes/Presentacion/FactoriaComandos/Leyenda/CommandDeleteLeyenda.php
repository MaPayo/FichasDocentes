<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteLeyenda implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saLeyenda = $factorySA->createSALeyenda();
        $leyenda = $saLeyenda->deleteLeyenda($data);
        $responseContext = null;
        if ($leyenda) {
            $responseContext = new Context(DELETE_LEYENDA_OK, $leyenda);
        } else {
            $responseContext = new Context(DELETE_LEYENDA_FAIL, null);
        }
        return $responseContext;
    }
}
