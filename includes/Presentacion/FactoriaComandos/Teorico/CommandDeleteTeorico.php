<?php

namespace es\ucm;
include "Event.php";

class CommandDeleteTeorico implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saTeorico = $factorySA->createSATeorico();
        $teorico = $saTeorico->deleteTeorico($data);
        $responseContext = null;
        if($teorico){
            $responseContext = new Context(DELETE_TEORICO_OK, $teorico); 
        }
        else{
            $responseContext = new Context(DELETE_TEORICO_FAIL, null);
        }
        return $responseContext;
        
    }

}