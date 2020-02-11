<?php

namespace es\ucm;
include "Event.php";

class CommandFindAdministrador implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saAdministrador = $factorySA->createSAAdministrador();
        $administrador = $saAdministrador->findAdministrador($data);
        $responseContext = null;
        if($administrador !=null){
            $responseContext = new Context(FIND_ADMINISTRADOR_OK, $administrador); 
        }
        else{
            $responseContext = new Context(FIND_ADMINISTRADOR_FAIL, null);
        }
        return $responseContext;
        
    }

}