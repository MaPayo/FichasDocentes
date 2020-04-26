<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModGrupoLaboratorio implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorio = $factorySA->createSAModGrupoLaboratorio();
        $grupoLaboratorio = $saGrupoLaboratorio->createModGrupoLaboratorio($data);
        $responseContext = null;
        if ($grupoLaboratorio) {
            $responseContext = new Context(CREATE_MODGRUPO_LABORATORIO_OK, $grupoLaboratorio);
        } else {
            $responseContext = new Context(CREATE_MODGRUPO_LABORATORIO_FAIL, null);
        }
        return $responseContext;
    }
}