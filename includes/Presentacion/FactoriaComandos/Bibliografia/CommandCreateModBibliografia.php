<?php

namespace es\ucm;
include "Event.php";

class CommandCreateModBibliografia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saBibliografia = $factorySA->createSAModBibliografia();
        $bibliografia = $saBibliografia->createModBibliografia($data);
        $responseContext = null;
        if($bibliografia !=null){
            $responseContext = new Context(CREATE_ASIGNATURA_OK, $bibliografia); 
        }
        else{
            $responseContext = new Context(CREATE_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}