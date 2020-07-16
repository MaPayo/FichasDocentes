<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoClaseProfesor/DAOGrupoClaseProfesor.php');

class DAOGrupoClaseProfesorImplements implements DAOGrupoClaseProfesor
{


    public static function listGrupoClaseProfesor($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $idGrupoClase,
            ':emailProfesor' => $emailProfesor
        );
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createGrupoClaseProfesor($grupoClaseProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
<<<<<<< Updated upstream
        $sql = "INSERT INTO grupoclaseprofesor (IdGrupoClase,EmailProfesor) 
        VALUES (:idGrupoClase, :emailProfesor)";
        $values = array(
            ':idGrupoClase' => $grupoClaseProfesor->getIdGrupoClase(),
=======
        $sql = "INSERT INTO grupoclaseprofesor (IdGrupoClase,Tipo,Fechas,EmailProfesor) 
        VALUES (:idGrupoClase, :tipo, :fechas, :emailProfesor)";
        $values = array(
            ':idGrupoClase' => $grupoClaseProfesor->getIdGrupoClase(),
            ':tipo' => $grupoClaseProfesor->getTipo(),
            ':fechas' => $grupoClaseProfesor->getFechas(),
>>>>>>> Stashed changes
            ':emailProfesor' => $grupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateGrupoClaseProfesor($grupoClaseProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
<<<<<<< Updated upstream
        $sql = "UPDATE grupoclaseprofesor SET IdGrupoClase = :idGrupoClase, EmailProfesor = :emailProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $grupoClaseProfesor->getIdGrupoClase(),
=======
        $sql = "UPDATE grupoclaseprofesor SET IdGrupoClase = :idGrupoClase, Tipo = :tipo, Fechas = :fechas,EmailProfesor = :emailProfesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $grupoClaseProfesor->getIdGrupoClase(),
            ':tipo' => $grupoClaseProfesor->getTipo(),
            ':fechas' => $grupoClaseProfesor->getFechas(),
>>>>>>> Stashed changes
            ':emailProfesor' => $grupoClaseProfesor->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteGrupoClaseProfesor($idGrupoClase, $emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM grupoclaseprofesor WHERE IdGrupoClase = :idGrupoClase AND EmailProfesor = :emailProfesor";
        $values = array(
            ':idGrupoClase' => $idGrupoClase,
            ':emailProfesor' =>$emailProfesor
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
