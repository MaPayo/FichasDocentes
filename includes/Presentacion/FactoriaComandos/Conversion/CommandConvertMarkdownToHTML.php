<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandConvertMarkdownToHTML implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        /* $saConversion = $factorySA->createSAConversion();
        $grado = $saConversion->convertMarkdownToHTML($data);
        $responseContext = null;
        if ($grado) {
            $responseContext = new Context(CONVERSION_HTML_OK, $grado);
        } else {
            $responseContext = new Context(CONVERSION_HTML_FAIL, null);
        }
        return $responseContext;*/
    }
}
