<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateGrupoClase implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClase = $factorySA->createSAGrupoClase();
        $grupoClase = $saGrupoClase->createGrupoClase($data);
        $responseContext = null;
        if ($grupoClase) {
            $responseContext = new Context(CREATE_GRUPO_CLASE_OK, $grupoClase);
        } else {
            $responseContext = new Context(CREATE_GRUPO_CLASE_FAIL, null);
        }
        return $responseContext;
    }
}