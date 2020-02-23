<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/Event.php');
require_once('includes/Presentacion/Controlador/Dispatcher.php');

class DispatcherImplements extends Dispatcher
{


    public function updateView($responseContext)
    {

        $event = $responseContext->getEvent();
        $data = $responseContext->getData();

        switch ($event) {
            case FIND_ADMINISTRADOR_OK:
                return $data;
            case FIND_ADMINISTRADOR_FAIL:
                return $data;
            case FIND_ASIGNATURA_OK:
                return $data;
            case FIND_ASIGNATURA_FAIL:
                return $data;
            case FIND_GRADO_OK:
                return $data;
            case FIND_GRADO_FAIL:
                return $data;
            case FIND_LABORATORIO_OK:
                return $data;
            case FIND_LABORATORIO_FAIL:
                return $data;
            case FIND_PROBLEMA_OK:
                return $data;
            case FIND_PROBLEMA_FAIL:
                return $data;
            case FIND_PROFESOR_OK:
                return $data;
            case FIND_PROFESOR_FAIL:
                return $data;
            case FIND_PERMISOS_OK:
                return $data;
            case FIND_PERMISOS_FAIL:
                return $data;
            case FIND_TEORICO_OK:
                return $data;
            case FIND_TEORICO_FAIL:
                return $data;
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
