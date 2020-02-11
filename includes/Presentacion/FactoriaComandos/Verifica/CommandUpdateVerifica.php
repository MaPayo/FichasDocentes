<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateVerifica implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saVerifica = $factorySA->createSAVerifica();
        $verifica = $saVerifica->updateVerifica($data);
        $responseContext = null;
        if($verifica){
            $responseContext = new Context(UPDATE_VERIFICA_OK, $verifica); 
        }
        else{
            $responseContext = new Context(UPDATE_VERIFICA_FAIL, null);
        }
        return $responseContext;
        
    }

}