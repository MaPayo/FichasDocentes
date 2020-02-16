<?php

namespace es\ucm;
require_once('includes/Presentacion/Controlador/Controller.php');
require_once('includes/Presentacion/FactoriaComandos/FactoryCommandImplements.php');
require_once('includes/Presentacion/Controlador/DispatcherImplements.php');

class ControllerImplements extends Controller
{
    public function action($context)
    {
        $factoryCommand = new FactoryCommandImplements;
        $command = $factoryCommand->getCommand($context->getEvent());
        $data = $context->getData();
        if ($command != null) {
            $responseContext = $command->execute($data);
            $dispatcher = new DispatcherImplements;
            $result=$dispatcher->updateView($responseContext);
            return $result;
        }
    }
}
