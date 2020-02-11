<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateLeyenda implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saLeyenda = $factorySA->createSALeyenda();
        $leyenda = $saLeyenda->updateLeyenda($data);
        $responseContext = null;
        if($leyenda){
            $responseContext = new Context(UPDATE_LEYENDA_OK, $leyenda); 
        }
        else{
            $responseContext = new Context(UPDATE_LEYENDA_FAIL, null);
        }
        return $responseContext;
        
    }

}