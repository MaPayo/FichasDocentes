<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

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
