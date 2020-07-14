<?php

namespace es\ucm;

require_once('includes/Integracion/Configuracion/DAOConfiguracion.php');

class DAOConfiguracionImplements implements DAOConfiguracion
{
    public static function findConfiguracion($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM configuracion WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createConfiguracion($configuracion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO configuracion (IdConfiguracion,ConocimientosPrevios,BreveDescripcion,ProgramaTeorico,ProgramaSeminarios,ProgramaLaboratorio,Influencia,ComGenerales,ComEspecificas,ComBasicas,ResultadosAprendizaje,Metodologia,CitasBibliograficas,RecursosInternet,GrupoLaboratorio,RealizacionExamenes,RealizacionActividades,RealizacionLaboratorio,CalificacionFinalO,CalificacionFinalE,Parcial,Laboratorio,Final,Extraordinario,IdAsignatura) 
        VALUES (:idConfiguracion, :conocimientosPrevios, :breveDescripcion, :programaTeorico, :programaSeminarios, :programaLaboratorio, :influencia, :comGenerales, :comEspecificas, :comBasicas, :resultadosAprendizaje, :metodologia, :citasBibliograficas, :recursosInternet, :grupoLaboratorio, :realizacionExamenes, :realizacionActividades, :realizacionLaboratorio, :calificacionFinalO, :calificacionFinalE, :parcial, :laboratorio, :final, :extraordinario, :idAsignatura)";
        $values = array(
            ':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaTeorico' => $configuracion->getProgramaTeorico(),
            ':programaSeminarios' => $configuracion->getProgramaSeminarios(),
            ':programaLaboratorio' => $configuracion->getProgramaLaboratorio(),
            ':influencia' => $configuracion->getInfluencia(),
            ':comGenerales' => $configuracion->getComGenerales(),
            ':comEspecificas' => $configuracion->getComEspecificas(),
            ':comBasicas' => $configuracion->getComBasicas(),
            ':resultadosAprendizaje' => $configuracion->getResultadosAprendizaje(),
            ':metodologia' => $configuracion->getMetodologia(),
            ':citasBibliograficas' => $configuracion->getCitasBibliograficas(),
            ':recursosInternet' => $configuracion->getRecursosInternet(),
            ':grupoLaboratorio' => $configuracion->getGrupoLaboratorio(),
            ':realizacionExamenes' => $configuracion->getRealizacionExamenes(),
            ':realizacionActividades' => $configuracion->getRealizacionActividades(),
            ':realizacionLaboratorio' => $configuracion->getRealizacionLaboratorio(),
            ':calificacionFinalO' => $configuracion->getCalificacionFinalO(),
            ':calificacionFinalE' => $configuracion->getCalificacionFinalE(),
            ':parcial' => $configuracion->getParcial(),
            ':laboratorio' => $configuracion->getLaboratorio(),
            ':final' => $configuracion->getFinal(),
            ':extraordinario' => $configuracion->getExtraordinario(),
            ':idAsignatura' => $configuracion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateConfiguracion($configuracion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE configuracion SET IdConfiguracion = :idConfiguracion, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaTeorico = :programaTeorico,ProgramaSeminarios = :programaSeminarios,ProgramaLaboratorio = :programaLaboratorio,Influencia = :influencia,ComGenerales = :comGenerales,ComEspecificas = :comEspecificas,ComBasicas = :comBasicas,ResultadosAprendizaje = :resultadosAprendizaje,Metodologia = :metodologia,CitasBibliograficas = :citasBibliograficas,RecursosInternet = :recursosInternet, GrupoLaboratorio=:grupoLaboratorio, RealizacionExamenes = :realizacionExamenes,RealizacionActividades = :realizacionActividades,RealizacionLaboratorio = :realizacionLaboratorio,CalificacionFinalO = :calificacionFinalO,CalificacionFinalE = :calificacionFinalE,Parcial = :parcial,Laboratorio = :laboratorio,Final = :final,Extraordinario = :extraordinarios,IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaTeorico' => $configuracion->getProgramaTeorico(),
            ':programaSeminarios' => $configuracion->getProgramaSeminarios(),
            ':programaLaboratorio' => $configuracion->getProgramaLaboratorio(),
            ':influencia' => $configuracion->getInfluencia(),
            ':comGenerales' => $configuracion->getComGenerales(),
            ':comEspecificas' => $configuracion->getComEspecificas(),
            ':comBasicas' => $configuracion->getComBasicas(),
            ':resultadosAprendizaje' => $configuracion->getResultadosAprendizaje(),
            ':metodologia' => $configuracion->getMetodologia(),
            ':citasBibliograficas' => $configuracion->getCitasBibliograficas(),
            ':recursosInternet' => $configuracion->getRecursosInternet(),
            ':grupoLaboratorio' => $configuracion->getGrupoLaboratorio(),
            ':realizacionExamenes' => $configuracion->getRealizacionExamenes(),
            ':realizacionActividades' => $configuracion->getRealizacionActividades(),
            ':realizacionLaboratorio' => $configuracion->getRealizacionLaboratorio(),
            ':calificacionFinalO' => $configuracion->getCalificacionFinalO(),
            ':calificacionFinalE' => $configuracion->getCalificacionFinalE(),
            ':parcial' => $configuracion->getParcial(),
            ':laboratorio' => $configuracion->getLaboratorio(),
            ':final' => $configuracion->getFinal(),
            ':extraordinario' => $configuracion->getExtraordinario(),
            ':idAsignatura' => $configuracion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteConfiguracion($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM configuracion WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
