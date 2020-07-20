<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandCreateCompetenciasAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saCompetencia = $factorySA->createSACompetenciaAsignatura();
        $competencia = $saCompetencia->createCompetenciaAsignatura($data);
        $responseContext = null;
        if ($competencia != null) {
            $responseContext = new Context(CREATE_COMPETENCIAS_ASIGNATURA_OK, $competencia);
        } else {
            $responseContext = new Context(CREATE_COMPETENCIAS_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
