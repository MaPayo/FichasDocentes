<?php
namespace es\ucm;
include(Event.php);

class FactoryCommandImplements extends FactoryCommand{

    public function getCommand($event){
        switch($event){
            case CREATE_ADMINISTRADOR:
                return new CommandCreateAdministrador();
            break;
        }
        


    }

}