<?php

namespace es\ucm;

class ControllerImplements implements Controller
{


    public function action($context)
    {

        $factoryCommand = new FactoryCommandImplements;
        $command = $factoryCommand->getCommand($context->getEvent());
        $data = $context->getData();
        if ($command != null) {
            $responseContext = $command->execute($data);
            $dispatcher = new DispatcherImplements;
            $dispatcher->updateView($responseContext);
        }
    }
}
