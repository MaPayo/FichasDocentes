<?php
namespace es\ucm;

class FactoriesSAImplements implements FactoriesSA{

    public static function createSAAsignatura(){
        return new SAAsignaturaImplements();
    }
}
