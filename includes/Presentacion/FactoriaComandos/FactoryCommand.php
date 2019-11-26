<?php
namespace es\ucm;

abstract class FactoryCommand{

    abstract public function getCommand($event);
}