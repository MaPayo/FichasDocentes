<?php
namespace es\ucm;

class DAOModProgramaAsignaturaImplements implements DAOModProgramaAsignatura{


    public static function findModProgramaAsignatura($idPrograma){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modProgramaAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $idPrograma);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modProgramaAsignatura (IdPrograma,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdModAsignatura) 
        VALUES (:idPrograma, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idModAsignatura)";
        $values=array(':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modProgramaAsignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdModAsignatura = :idModAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModProgramaAsignatura($idPrograma){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modProgramaAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $idPrograma);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}