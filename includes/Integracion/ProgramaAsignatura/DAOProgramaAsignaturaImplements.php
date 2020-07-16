<?php
namespace es\ucm;
require_once('includes/Integracion/ProgramaAsignatura/DAOProgramaAsignatura.php');

class DAOProgramaAsignaturaImplements implements DAOProgramaAsignatura{


    public static function findProgramaAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM programaasignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

<<<<<<< Updated upstream
    public static function createProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO programaasignatura (IdPrograma,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdAsignatura) 
        VALUES (:idPrograma, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idAsignatura)";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
=======
    public static function createProgramaAsignatura($programaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO programaasignatura (ConocimientosPrevios,ConocimientosPreviosi,BreveDescripcion,BreveDescripcioni,ProgramaTeorico,ProgramaTeoricoi, ProgramaSeminarios, ProgramaSeminariosi, ProgramaLaboratorio, ProgramaLaboratorioi, Influencia, Influenciai,IdAsignatura) 
        VALUES (:conocimientosPrevios, :conocimientosPreviosI, :breveDescripcion, :breveDescripcionI, :programaTeorico, :programaTeoricoI, :programaSeminarios, :programaSeminariosI, :programaLaboratorio, :programaLaboratorioI, :idAsignatura)";
        $values = array(
>>>>>>> Stashed changes
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
<<<<<<< Updated upstream
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':programaTeorico' => $programaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $programaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $programaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $programaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $programaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $programaAsignatura->getProgramaLaboratorioI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;

    }

<<<<<<< Updated upstream
    public static function updateProgramaAsignatura($programaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE programaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdAsignatura = :idAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $programaAsignatura->getIdPrograma(),
=======
    public static function updateProgramaAsignatura($programaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE programaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,ConocimientosPreviosi = :conocimientosPreviosI,BreveDescripcion = :breveDescripcion,BreveDescripcioni = :breveDescripcionI,ProgramaTeorico = :programaTeorico,ProgramaTeoricoi = :programaTeoricoI,ProgramaSeminarios = :programaSeminarios,ProgramaSeminariosi = :programaSeminariosI,ProgramaLaboratorio = :programaLaboratorio,ProgramaLaboratorioi = :programaLaboratorioI,IdAsignatura = :idAsignatura WHERE IdPrograma = :idPrograma";
        $values = array(
            ':idPrograma' => $programaAsignatura->getIdPrograma(),
>>>>>>> Stashed changes
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $programaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
<<<<<<< Updated upstream
            ':programaDetalladoI' => $programaAsignatura->getProgramaDetalladoI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':programaTeorico' => $programaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $programaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $programaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $programaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $programaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $programaAsignatura->getProgramaLaboratorioI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;
    }

    public static function deleteProgramaAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM programaasignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}