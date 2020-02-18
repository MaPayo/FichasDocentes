<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saLaboratorio = $factorySA->createSALaboratorio();
        $laboratorio = $saLaboratorio->createLaboratorio($data);
        $responseContext = null;
        if ($laboratorio) {
            $responseContext = new Context(CREATE_LABORATORIO_OK, $laboratorio);
        } else {
            $responseContext = new Context(CREATE_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}
