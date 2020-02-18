<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/FactoriaComandos/Command.php');
require_once('includes/Presentacion/Controlador/Context.php');

class CommandCreateModProgramaAsignatura implements Command
{
    public function execute($data)
    {
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAModProgramaAsignatura();
        $programa = $saPrograma->createModProgramaAsignatura($data);
        $responseContext = null;
        if ($programa) {
            $responseContext = new Context(CREATE_MODPROGRAMA_ASIGNATURA_OK, $programa);
        } else {
            $responseContext = new Context(CREATE_MODPROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
    }
}
