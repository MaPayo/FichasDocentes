<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindGrupoClaseLetra implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoClase = $factorySA->createSAGrupoClase();
        $grupoClase = $saGrupoClase->findGrupoClaseLetra($data);
        $responseContext = null;
        if (isset($grupoClase)) {
            $responseContext = new Context(FIND_GRUPO_CLASE_LETRA_OK, $grupoClase);
        } else {
            $responseContext = new Context(FIND_GRUPO_CLASE_LETRA_FAIL, null);
        }
        return $responseContext;
    }
}
