<?php

namespace es\ucm;
include "Event.php";

class CommandCreateProgramaAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAProgramaAsignatura();
        $programa = $saPrograma->createProgramaAsignatura($data);
        $responseContext = null;
        if($programa){
            $responseContext = new Context(CREATE_PROGRAMA_ASIGNATURA_OK, $programa); 
        }
        else{
            $responseContext = new Context(CREATE_PROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}