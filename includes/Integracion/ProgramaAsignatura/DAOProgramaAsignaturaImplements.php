<?php

namespace es\ucm;

require_once('includes/Integracion/ProgramaAsignatura/DAOProgramaAsignatura.php');

class DAOProgramaAsignaturaImplements implements DAOProgramaAsignatura
{
    public static function findProgramaAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM programaasignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createProgramaAsignatura($programaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO programaasignatura (ConocimientosPrevios,ConocimientosPreviosi,BreveDescripcion,BreveDescripcioni,ProgramaTeorico,ProgramaTeoricoi, ProgramaSeminarios, ProgramaSeminariosi, ProgramaLaboratorio, ProgramaLaboratorioi, Influencia, Influenciai,IdAsignatura) 
        VALUES (:conocimientosPrevios, :conocimientosPreviosI, :breveDescripcion, :breveDescripcionI, :programaTeorico, :programaTeoricoI, :programaSeminarios, :programaSeminariosI, :programaLaboratorio, :programaLaboratorioI, :idAsignatura)";
        $values = array(
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaTeorico' => $programaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $programaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $programaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $programaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $programaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $programaAsignatura->getProgramaLaboratorioI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateProgramaAsignatura($programaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE programaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,ConocimientosPreviosi = :conocimientosPreviosI,BreveDescripcion = :breveDescripcion,BreveDescripcioni = :breveDescripcionI,ProgramaTeorico = :programaTeorico,ProgramaTeoricoi = :programaTeoricoI,ProgramaSeminarios = :programaSeminarios,ProgramaSeminariosi = :programaSeminariosI,ProgramaLaboratorio = :programaLaboratorio,ProgramaLaboratorioi = :programaLaboratorioI,IdAsignatura = :idAsignatura WHERE IdPrograma = :idPrograma";
        $values = array(
            ':idPrograma' => $programaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $programaAsignatura->getConocimientosPrevios(),
            ':conocimientosPreviosI' => $programaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcion' => $programaAsignatura->getBreveDescripcion(),
            ':breveDescripcionI' => $programaAsignatura->getBreveDescripcionI(),
            ':programaTeorico' => $programaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $programaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $programaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $programaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $programaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $programaAsignatura->getProgramaLaboratorioI(),
            ':idAsignatura' => $programaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteProgramaAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM programaasignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
