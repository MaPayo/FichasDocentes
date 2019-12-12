<?php

namespace es\ucm;

class CommandCreateAsignatura implements Command
{


    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        
    }

}