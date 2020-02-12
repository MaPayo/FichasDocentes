<?php

namespace es\ucm;

include "Event.php";

class CommandDeleteVerifica implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saVerifica = $factorySA->createSAVerifica();
        $verifica = $saVerifica->deleteVerifica($data);
        $responseContext = null;
        if ($verifica) {
            $responseContext = new Context(DELETE_VERIFICA_OK, $verifica);
        } else {
            $responseContext = new Context(DELETE_VERIFICA_FAIL, null);
        }
        return $responseContext;
    }
}
