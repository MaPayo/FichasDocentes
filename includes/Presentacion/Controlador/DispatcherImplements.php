<?php

namespace es\ucm;

class DispatcherImplements extends Dispatcher
{


public function updateView($responseContext){

    $event = $responseContext->getEvent();
    $data= $responseContext->getData();

    switch($event){

        //Eventos a las vistas
    }

}

}