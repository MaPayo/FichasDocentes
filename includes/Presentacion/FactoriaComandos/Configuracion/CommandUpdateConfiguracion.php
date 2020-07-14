<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateConfiguracion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saConfiguracion = $factorySA->createSAConfiguracion();
        $configuracion = $saConfiguracion->updateConfiguracion($data);
        $responseContext = null;
        if ($configuracion != null) {
            $responseContext = new Context(UPDATE_CONFIGURACION_OK, $configuracion);
        } else {
            $responseContext = new Context(UPDATE_CONFIGURACION_FAIL, null);
        }
        return $responseContext;
    }
}
