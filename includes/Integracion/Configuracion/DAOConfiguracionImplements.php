<?php
namespace es\ucm;
require_once('includes/Integracion/Configuracion/DAOConfiguracion.php');

class DAOConfiguracionImplements implements DAOConfiguracion{


    public static function findConfiguracion($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM configuracion WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

<<<<<<< Updated upstream
    public static function createConfiguracion($configuracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO configuracion (IdConfiguracion,ConocimientosPrevios,BreveDescripcion,ProgramaDetallado,ComGenerales,ComEspecificas,ComBasicas,ResultadosAprendizaje,Metodologia,CitasBibliograficas,RecursosInternet,RealizacionExamenes,CalificacionFinal,RealizacionActividades,RealizacionLaboratorio,IdAsignatura) 
        VALUES (:idConfiguracion, :conocimientosPrevios, :breveDescripcion, :programaDetallado, :comGenerales, :comEspecificas, :comBasicas, :resultadosAprendizaje, :metodologia, :citasBibliograficas, :recursosInternet, :realizacionExamenes, :calificacionFinal, :realizacionActividades, :realizacionLaboratorio, :idAsignatura)";
        $values=array(':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaDetallado' => $configuracion->getProgramaDetallado(),
=======
    public static function createConfiguracion($configuracion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO configuracion (IdConfiguracion,ConocimientosPrevios,BreveDescripcion,ProgramaTeorico,ProgramaSeminarios,ProgramaLaboratorio,ComGenerales,ComEspecificas,ComBasicas,ResultadosAprendizaje,Metodologia,CitasBibliograficas,RecursosInternet,GrupoLaboratorio,RealizacionExamenes,RealizacionActividades,RealizacionLaboratorio,CalificacionFinal,IdAsignatura) 
        VALUES (:idConfiguracion, :conocimientosPrevios, :breveDescripcion, :programaTeorico, :programaSeminarios, :programaLaboratorio, :comGenerales, :comEspecificas, :comBasicas, :resultadosAprendizaje, :metodologia, :citasBibliograficas, :recursosInternet, :grupoLaboratorio, :realizacionExamenes, :realizacionActividades, :realizacionLaboratorio, :calificacionFinal, :idAsignatura)";
        $values = array(
            ':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaTeorico' => $configuracion->getProgramaTeorico(),
            ':programaSeminarios' => $configuracion->getProgramaSeminarios(),
            ':programaLaboratorio' => $configuracion->getProgramaLaboratorio(),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            ':idAsignatura' => $configuracion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':calificacionFinal' => $configuracion->getCalificacionFinal(),
            ':idAsignatura' => $configuracion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;

    }

<<<<<<< Updated upstream
    public static function updateConfiguracion($configuracion){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE configuracion SET IdConfiguracion = :idConfiguracion, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaDetallado = :programaDetallado,ComGenerales = :comGenerales,ComEspecificas = :comEspecificas,ComBasicas = :comBasicas,ResultadosAprendizaje = :resultadosAprendizaje,Metodologia = :metodologia,CitasBibliograficas = :citasBibliograficas,RecursosInternet = :recursosInternet,RealizacionExamenes = :realizacionExamenes,CalificacionFinal = :calificacionFinal,RealizacionActividades = :realizacionActividades,RealizacionLaboratorio = :realizacionLaboratorio,IdAsignatura = :idAsignatura WHERE IdConfiguracion = :idConfiguracion";
        $values=array(':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaDetallado' => $configuracion->getProgramaDetallado(),
=======
    public static function updateConfiguracion($configuracion)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE configuracion SET IdConfiguracion = :idConfiguracion, ConocimientosPrevios = :conocimientosPrevios,BreveDescripcion = :breveDescripcion,ProgramaTeorico = :programaTeorico,ProgramaSeminarios = :programaSeminarios,ProgramaLaboratorio = :programaLaboratorio,ComGenerales = :comGenerales,ComEspecificas = :comEspecificas,ComBasicas = :comBasicas,ResultadosAprendizaje = :resultadosAprendizaje,Metodologia = :metodologia,CitasBibliograficas = :citasBibliograficas,RecursosInternet = :recursosInternet, GrupoLaboratorio=:grupoLaboratorio, RealizacionExamenes = :realizacionExamenes,RealizacionActividades = :realizacionActividades,RealizacionLaboratorio = :realizacionLaboratorio,CalificacionFinal = :calificacionFinal,IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idConfiguracion' => $configuracion->getIdConfiguracion(),
            ':conocimientosPrevios' => $configuracion->getConocimientosPrevios(),
            ':breveDescripcion' => $configuracion->getBreveDescripcion(),
            ':programaTeorico' => $configuracion->getProgramaTeorico(),
            ':programaSeminarios' => $configuracion->getProgramaSeminarios(),
            ':programaLaboratorio' => $configuracion->getProgramaLaboratorio(),
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            ':idAsignatura' => $configuracion->getIdAsignatura());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
=======
            ':calificacionFinal' => $configuracion->getCalificacionFinal(),
            ':idAsignatura' => $configuracion->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
>>>>>>> Stashed changes
        return $results;
    }

    public static function deleteConfiguracion($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM configuracion WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}