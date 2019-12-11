<?php
namespace es\ucm;

class DAOProgramaAsignaturaImplements implements DAOProgramaAsignatura{


    public static function findProgramaAsignatura($idPrograma){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM programaAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $idPrograma);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO programaAsignatura (IdPrograma,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdAsignatura) 
        VALUES (:idPrograma, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idAsignatura)";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE programaAsignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdAsignatura = :idAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteProgramaAsignatura($idPrograma){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM programaAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $idPrograma);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}