<?php
namespace es\ucm;
require_once('includes/Integracion/Configuracion/DAOConfiguracion.php');

class DAOConfiguracionImplements implements DAOConfiguracion{


    public static function findConfiguracion($idConfiguracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM configuracion WHERE IdConfiguracion = :idConfiguracion";
        $values=array(':idConfiguracion' => $idConfiguracion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createConfiguracion($configuracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO configuracion (IdConfiguracion,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ComGenerales,ComEspecificas,ComBasicas,ResultadosAprendizaje,Metodologia,CitasBibliograficas,RecursosInternet,GrupoLaboratorio,RealizacionExamenes,CalificacionFinal,RealizacionActividades,RealizacionLaboratorio,IdAsignatura) 
        VALUES (:idConfiguracion, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :comGenerales, :comEspecificas, :comBasicas, :resultadosAprendizaje, :metodologia, :citasBibliograficas, :recursosInternet, :grupoLaboratorio, :realizacionExamenes, :calificacionFinal, :realizacionActividades, :realizacionLaboratorio, :idAsignatura)";
        $values=array(':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaDetallado' => $configuracion->getProgramaDetallado(),
            ':comGenerales' => $configuracion->getComGenerales(),
            ':comEspecificas' => $configuracion->getComEspecificas(),
            ':comBasicas' => $configuracion->getComBasicas(),
            ':resultadosAprendizaje' => $configuracion->getResultadosAprendizaje(),
            ':metodologia' => $configuracion->getMetodologia(),
            ':citasBibliograficas' => $configuracion->getCitasBibliograficas(),
            ':recursosInternet' => $configuracion->getRecursosInternet(),
            ':realizacionExamenes' => $configuracion->getRealizacionExamenes(),
            ':calificacionFinal' => $configuracion->getCalificacionFinal(),
            ':realizacionActividades' => $configuracion->getRealizacionActividades(),
            ':realizacionLaboratorio' => $configuracion->getRealizacionLaboratorio(),
            ':idAsignatura' => $configuracion->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateConfiguracion($configuracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE configuracion SET IdConfiguracion = :idConfiguracion, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ComGenerales = :comGenerales,ComEspecificas = :comEspecificas,ComBasicas = :comBasicas,ResultadosAprendizaje = :resultadosAprendizaje,Metodologia = :metodologia,CitasBibliograficas = :citasBibliograficas,RecursosInternet = :recursosInternet,GrupoLaboratorio = :grupoLaboratorio,RealizacionExamenes = :realizacionExamenes,CalificacionFinal = :calificacionFinal,RealizacionActividades = :realizacionActividades,RealizacionLaboratorio = :realizacionLaboratorio,IdAsignatura = :idAsignatura WHERE IdConfiguracion = :idConfiguracion";
        $values=array(':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaDetallado' => $configuracion->getProgramaDetallado(),
            ':comGenerales' => $configuracion->getComGenerales(),
            ':comEspecificas' => $configuracion->getComEspecificas(),
            ':comBasicas' => $configuracion->getComBasicas(),
            ':resultadosAprendizaje' => $configuracion->getResultadosAprendizaje(),
            ':metodologia' => $configuracion->getMetodologia(),
            ':citasBibliograficas' => $configuracion->getCitasBibliograficas(),
            ':recursosInternet' => $configuracion->getRecursosInternet(),
            ':realizacionExamenes' => $configuracion->getRealizacionExamenes(),
            ':calificacionFinal' => $configuracion->getCalificacionFinal(),
            ':realizacionActividades' => $configuracion->getRealizacionActividades(),
            ':realizacionLaboratorio' => $configuracion->getRealizacionLaboratorio(),
            ':idAsignatura' => $configuracion->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteConfiguracion($idConfiguracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM configuracion WHERE IdConfiguracion = :idConfiguracion";
        $values=array(':idConfiguracion' => $idConfiguracion);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}