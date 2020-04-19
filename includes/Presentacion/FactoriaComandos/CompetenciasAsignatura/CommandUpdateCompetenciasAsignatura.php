<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandUpdateCompetenciasAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saCompetencia = $factorySA->createSACompetenciaAsignatura();
        $competencia = $saCompetencia->updateCompetenciaAsignatura($data);
        $responseContext = null;
        if ($competencia != null) {
            $responseContext = new Context(UPDATE_COMPETENCIAS_ASIGNATURA_OK, $competencia);
        } else {
            $responseContext = new Context(UPDATE_COMPETENCIAS_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}