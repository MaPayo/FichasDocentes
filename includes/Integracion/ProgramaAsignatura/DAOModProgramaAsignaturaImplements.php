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

<<<<<<< Updated upstream
    public static function createModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modprogramaasignatura (ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ConocimientosPreviosI,BreveDescripcionI,ProgramaDetalladoI,IdModAsignatura) 
        VALUES (:conocimientosPrevios, :breveDescripcion, :programaDetallado, :conocimientosPreviosI, :breveDescripcionI, :programaDetalladoI, :idModAsignatura)";
        $values=array(':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
=======
    public static function createModProgramaAsignatura($modProgramaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modprogramaasignatura (ConocimientosPrevios,ConocimientosPreviosi,BreveDescripcion,BreveDescripcioni,ProgramaTeorico,ProgramaTeoricoi, ProgramaSeminarios, ProgramaSeminariosi, ProgramaLaboratorio, ProgramaLaboratorioi, Influencia, Influenciai,IdModAsignatura) 
        VALUES (:conocimientosPrevios, :conocimientosPreviosI, :breveDescripcion, :breveDescripcionI, :programaTeorico, :programaTeoricoI, :programaSeminarios, :programaSeminariosI, :programaLaboratorio, :programaLaboratorioI, :idModAsignatura)";
        $values = array(
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
>>>>>>> Stashed changes
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
<<<<<<< Updated upstream
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':programaTeorico' => $modProgramaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $modProgramaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $modProgramaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $modProgramaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $modProgramaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $modProgramaAsignatura->getProgramaLaboratorioI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;

    }

<<<<<<< Updated upstream
    public static function updateModProgramaAsignatura($modProgramaAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modprogramaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ConocimientosPreviosI = :conocimientosPreviosI,BreveDescripcionI = :breveDescripcionI,ProgramaDetalladoI = :programaDetalladoI,IdModAsignatura = :idModAsignatura WHERE IdPrograma = :idPrograma";
        $values=array(':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
=======
    public static function updateModProgramaAsignatura($modProgramaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modprogramaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,ConocimientosPreviosi = :conocimientosPreviosI,BreveDescripcion = :breveDescripcion,BreveDescripcioni = :breveDescripcionI,ProgramaTeorico = :programaTeorico,ProgramaTeoricoi = :programaTeoricoI,ProgramaSeminarios = :programaSeminarios,ProgramaSeminariosi = :programaSeminariosI,ProgramaLaboratorio = :programaLaboratorio,ProgramaLaboratorioi = :programaLaboratorioI,IdModAsignatura = :idModAsignatura WHERE IdPrograma = :idPrograma";
        $values = array(
            ':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
>>>>>>> Stashed changes
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':programaDetallado' => $modProgramaAsignatura->getProgramaDetallado(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
<<<<<<< Updated upstream
            ':programaDetalladoI' => $modProgramaAsignatura->getProgramaDetalladoI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':programaTeorico' => $modProgramaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $modProgramaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $modProgramaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $modProgramaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $modProgramaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $modProgramaAsignatura->getProgramaLaboratorioI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
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