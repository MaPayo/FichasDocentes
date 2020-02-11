<?php

namespace es\ucm;
include "Event.php";

class CommandFindTeorico implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saTeorico = $factorySA->createSATeorico();
        $teorico = $saTeorico->findTeorico($data);
        $responseContext = null;
        if($teorico){
            $responseContext = new Context(FIND_TEORICO_OK, $teorico); 
        }
        else{
            $responseContext = new Context(FIND_TEORICO_FAIL, null);
        }
        return $responseContext;
        
    }

}