<?php

namespace es\ucm;

class FactoriesDAOImplements implements FactoriesDAO{

    public static function createDAOAsignatura(){
        return new DAOAsignaturaImplements();
    }

    
}