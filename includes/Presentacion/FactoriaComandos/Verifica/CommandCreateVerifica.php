<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateVerifica implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saVerifica = $factorySA->createSAVerifica();
        $verifica = $saVerifica->createVerifica($data);
        $responseContext = null;
        if ($verifica) {
            $responseContext = new Context(CREATE_VERIFICA_OK, $verifica);
        } else {
            $responseContext = new Context(CREATE_VERIFICA_FAIL, null);
        }
        return $responseContext;
    }
}
