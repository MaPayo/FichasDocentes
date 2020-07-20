<?php

namespace es\ucm;

require_once('includes/Integracion/ProgramaAsignatura/DAOModProgramaAsignatura.php');

class DAOModProgramaAsignaturaImplements implements DAOModProgramaAsignatura
{
    public static function findModProgramaAsignatura($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modprogramaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModProgramaAsignatura($modProgramaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modprogramaasignatura (ConocimientosPrevios,ConocimientosPreviosi,BreveDescripcion,BreveDescripcioni,ProgramaTeorico,ProgramaTeoricoi, ProgramaSeminarios, ProgramaSeminariosi, ProgramaLaboratorio, ProgramaLaboratorioi, Influencia, Influenciai,IdModAsignatura) 
        VALUES (:conocimientosPrevios, :conocimientosPreviosI, :breveDescripcion, :breveDescripcionI, :programaTeorico, :programaTeoricoI, :programaSeminarios, :programaSeminariosI, :programaLaboratorio, :programaLaboratorioI, :idModAsignatura)";
        $values = array(
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaTeorico' => $modProgramaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $modProgramaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $modProgramaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $modProgramaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $modProgramaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $modProgramaAsignatura->getProgramaLaboratorioI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModProgramaAsignatura($modProgramaAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modprogramaasignatura SET IdPrograma = :idPrograma, ConocimientosPrevios = :conocimientosPrevios,ConocimientosPreviosi = :conocimientosPreviosI,BreveDescripcion = :breveDescripcion,BreveDescripcioni = :breveDescripcionI,ProgramaTeorico = :programaTeorico,ProgramaTeoricoi = :programaTeoricoI,ProgramaSeminarios = :programaSeminarios,ProgramaSeminariosi = :programaSeminariosI,ProgramaLaboratorio = :programaLaboratorio,ProgramaLaboratorioi = :programaLaboratorioI,IdModAsignatura = :idModAsignatura WHERE IdPrograma = :idPrograma";
        $values = array(
            ':idPrograma' => $modProgramaAsignatura->getIdPrograma(),
            ':conocimientosPrevios' => $modProgramaAsignatura->getConocimientosPrevios(),
            ':conocimientosPreviosI' => $modProgramaAsignatura->getConocimientosPreviosI(),
            ':breveDescripcion' => $modProgramaAsignatura->getBreveDescripcion(),
            ':breveDescripcionI' => $modProgramaAsignatura->getBreveDescripcionI(),
            ':programaTeorico' => $modProgramaAsignatura->getProgramaTeorico(),
            ':programaTeoricoI' => $modProgramaAsignatura->getProgramaTeoricoI(),
            ':programaSeminarios' => $modProgramaAsignatura->getProgramaSeminarios(),
            ':programaSeminariosI' => $modProgramaAsignatura->getProgramaSeminariosI(),
            ':programaLaboratorio' => $modProgramaAsignatura->getProgramaLaboratorio(),
            ':programaLaboratorioI' => $modProgramaAsignatura->getProgramaLaboratorioI(),
            ':idModAsignatura' => $modProgramaAsignatura->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModProgramaAsignatura($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modprogramaasignatura WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
