<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandGeneracionPDF implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGeneracion = $factorySA->createSAGeneracion();
        $generacion = $saGeneracion->generacionPDF($data);
        $responseContext = null;
        if ($generacion) {
            $responseContext = new Context(GENERACION_PDF_OK, $generacion);
        } else {
            $responseContext = new Context(GENERACION_PDF_FAIL, null);
        }
        return $responseContext;
    }
}
