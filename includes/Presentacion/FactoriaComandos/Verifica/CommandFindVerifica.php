<?php

namespace es\ucm;
include "Event.php";

class CommandFindVerifica implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saVerifica = $factorySA->createSAVerifica();
        $verifica = $saVerifica->findVerifica($data);
        $responseContext = null;
        if($verifica){
            $responseContext = new Context(FIND_VERIFICA_OK, $verifica); 
        }
        else{
            $responseContext = new Context(FIND_VERIFICA_FAIL, null);
        }
        return $responseContext;
        
    }

}