<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandDeleteModCompetenciasAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saCompetencia = $factorySA->createSAModCompetenciaAsignatura();
        $competencia = $saCompetencia->deleteModCompetenciaAsignatura($data);
        $responseContext = null;
        if ($competencia != null) {
            $responseContext = new Context(DELETE_MODCOMPETENCIAS_ASIGNATURA_OK, $competencia);
        } else {
            $responseContext = new Context(DELETE_MODCOMPETENCIAS_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
