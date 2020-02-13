<?php

namespace es\ucm;

//include("Event.php");
require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/Controlador/Dispatcher.php');

class DispatcherImplements extends Dispatcher
{


public function updateView($responseContext){

    $event = $responseContext->getEvent();
    $data= $responseContext->getData();

    switch($event){

        case CREATE_USUARIO_OK:
            return $data;
        case CREATE_USUARIO_FAIL:
            return $data;
        case DELETE_USUARIO_OK:
            return $data;
        case DELETE_USUARIO_FAIL:
            return $data;
        case FIND_USUARIO_OK:
            return $data;
        case FIND_USUARIO_FAIL:
            return $data;
        case UPDATE_USUARIO_OK:
            return $data;
        case UPDATE_USUARIO_FAIL:
            return $data;
    }

}

}