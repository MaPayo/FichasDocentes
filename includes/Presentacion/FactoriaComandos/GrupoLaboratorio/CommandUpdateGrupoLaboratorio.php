<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandUpdateGrupoLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorio = $factorySA->createSAGrupoLaboratorio();
        $grupoLaboratorio = $saGrupoLaboratorio->updateGrupoLaboratorio($data);
        $responseContext = null;
        if ($grupoLaboratorio) {
            $responseContext = new Context(UPDATE_GRUPO_LABORATORIO_OK, $grupoLaboratorio);
        } else {
            $responseContext = new Context(UPDATE_GRUPO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}
