<?php

namespace es\ucm;
include "Event.php";

class CommandFindPermisos implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saPermisos = $factorySA->createSAPermisos();
        $permisos = $saPermisos->findPermisos($data);
        $responseContext = null;
        if($permisos){
            $responseContext = new Context(FIND_PERMISOS_OK, $permisos); 
        }
        else{
            $responseContext = new Context(FIND_PERMISOS_FAIL, null);
        }
        return $responseContext;
        
    }

}