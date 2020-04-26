<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Negocio/FactoriaNegocio/FactorySAImplements.php');

class CommandFindModCompetenciasAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saCompetencia = $factorySA->createSAModCompetenciaAsignatura();
        $competencia = $saCompetencia->findModCompetenciaAsignatura($data);
        $responseContext = null;
        if ($competencia != null) {
            $responseContext = new Context(FIND_MODCOMPETENCIAS_ASIGNATURA_OK, $competencia);
        } else {
            $responseContext = new Context(FIND_MODCOMPETENCIAS_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}