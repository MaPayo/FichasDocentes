<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindConfiguracion implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saConfiguracion = $factorySA->createSAConfiguracion();
        $configuracion = $saConfiguracion->findConfiguracion($data);
        $responseContext = null;
        if (isset($configuracion )) {
            $responseContext = new Context(FIND_CONFIGURACION_OK, $configuracion);
        } else {
            $responseContext = new Context(FIND_CONFIGURACION_FAIL, null);
        }
        return $responseContext;
    }
}
