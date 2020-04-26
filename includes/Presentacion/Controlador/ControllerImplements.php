<?php

namespace es\ucm;
require_once('includes/Presentacion/Controlador/Controller.php');
require_once('includes/Presentacion/FactoriaComandos/FactoryCommandImplements.php');
require_once('includes/Presentacion/FactoriaComandos/Event.php');

class ControllerImplements extends Controller
{
    public function action($context)
    {
        $factoryCommand = new FactoryCommandImplements;
        $command = $factoryCommand->getCommand($context->getEvent());
        $data = $context->getData();
        if ($command != null) {
            return $responseContext = $command->execute($data);
        }
        else return ERROR_EVENTO;
    }
}
