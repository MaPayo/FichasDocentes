<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandGeneracionHTMLEnglish implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGeneracion = $factorySA->createSAGeneracion();
        $generacion = $saGeneracion->generacionHTMLEnglish($data);
        $responseContext = null;
        if ($generacion) {
            $responseContext = new Context(GENERACION_HTML_ENGLISH_OK, $generacion);
        } else {
            $responseContext = new Context(GENERACION_HTML_ENGLISH_FAIL, null);
        }
        return $responseContext;
    }
}
