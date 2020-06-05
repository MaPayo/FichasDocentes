<?php
namespace es\ucm;
require_once('includes/Integracion/ProgramaAsignatura/DAOModProgramaAsignatura.php');

class DAOModProgramaAsignaturaImplements implements DAOModProgramaAsignatura{


    public static function findModProgramaAsignatura($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modprogramaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modprogramaasignatura (ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdModAsignatura) 
        VALUES (:conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idModAsignatura)";
        $values=array(':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modprogramaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdModAsignatura = :idModAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteModProgramaAsignatura($idModAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modprogramaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values=array(':idModAsignatura' => $idModAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}