<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandListModGrupoLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorio = $factorySA->createSAModGrupoLaboratorio();
        $grupoLaboratorio = $saGrupoLaboratorio->listModGrupoLaboratorio($data);
        $responseContext = null;
        if (isset($grupoLaboratorio)) {
            $responseContext = new Context(LIST_MODGRUPO_LABORATORIO_OK, $grupoLaboratorio);
        } else {
            $responseContext = new Context(LIST_MODGRUPO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}
