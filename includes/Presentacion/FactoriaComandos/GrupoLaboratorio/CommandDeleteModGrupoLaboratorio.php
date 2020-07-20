<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandDeleteModGrupoLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorio = $factorySA->createSAModGrupoLaboratorio();
        $grupoLaboratorio = $saGrupoLaboratorio->deleteModGrupoLaboratorio($data);
        $responseContext = null;
        if ($grupoLaboratorio) {
            $responseContext = new Context(DELETE_MODGRUPO_LABORATORIO_OK, $grupoLaboratorio);
        } else {
            $responseContext = new Context(DELETE_MODGRUPO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}
