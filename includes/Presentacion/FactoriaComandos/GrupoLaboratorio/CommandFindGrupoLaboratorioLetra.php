<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandFindGrupoLaboratorioLetra implements Command
{


    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saGrupoLaboratorio = $factorySA->createSAGrupoLaboratorio();
        $grupoLaboratorio = $saGrupoLaboratorio->findGrupoLaboratorioLetra($data);
        $responseContext = null;
        if (isset($grupoLaboratorio)) {
            $responseContext = new Context(FIND_GRUPO_LABORATORIO_LETRA_OK, $grupoLaboratorio);
        } else {
            $responseContext = new Context(FIND_GRUPO_LABORATORIO_LETRA_FAIL, null);
        }
        return $responseContext;
    }
}
