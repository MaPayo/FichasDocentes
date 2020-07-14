<?php

namespace es\ucm;

require_once('includes/Integracion/Permisos/DAOPermisos.php');

class DAOPermisosImplements implements DAOPermisos
{
    public static function findPermisos($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM permisos WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createPermisos($permisos)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO permisos (PermisoPrograma,PermisoCompetencias,PermisoMetodologia,PermisoBibliografia,PermisoGrupoLaboratorio,PermisoGrupoClase,PermisoEvaluacion,IdAsignatura,EmailProfesor) 
        VALUES ( :permisoPrograma, :permisoCompetencias, :permisoMetodologia, :permisoBibliografia, :permisoGrupoLaboratorio, :permisoGrupoClase, :permisoEvaluacion, :idAsignatura, :emailProfesor)";
        $values = array(
            ':permisoPrograma' => $permisos->getPermisoPrograma(),
            ':permisoCompetencias' => $permisos->getPermisoCompetencias(),
            ':permisoMetodologia' => $permisos->getPermisoMetodologia(),
            ':permisoBibliografia' => $permisos->getPermisoBibliografia(),
            ':permisoGrupoLaboratorio' => $permisos->getPermisoGrupoLaboratorio(),
            ':permisoGrupoClase' => $permisos->getPermisoGrupoClase(),
            ':permisoEvaluacion' => $permisos->getPermisoEvaluacion(),
            ':idAsignatura' => $permisos->getIdAsignatura(),
            ':emailProfesor' => $permisos->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updatePermisos($permisos)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE permisos SET IdPermiso = :idPermiso, PermisoPrograma = :permisoPrograma, PermisoCompetencias = :permisoCompetencias, PermisoMetodologia = :permisoMetodologia, PermisoBibliografia = :permisoBibliografia,PermisoGrupoLaboratorio = :permisoGrupoLaboratorio, PermisoGrupoClase = :permisoGrupoClase,PermisoEvaluacion = :permisoEvaluacion,IdAsignatura = :idAsignatura, EmailProfesor = :emailProfesor WHERE IdPermiso = :idPermiso";
        $values = array(
            ':idPermiso' => $permisos->getIdPermiso(),
            ':permisoPrograma' => $permisos->getPermisoPrograma(),
            ':permisoCompetencias' => $permisos->getPermisoCompetencias(),
            ':permisoMetodologia' => $permisos->getPermisoMetodologia(),
            ':permisoBibliografia' => $permisos->getPermisoBibliografia(),
            ':permisoGrupoLaboratorio' => $permisos->getPermisoGrupoLaboratorio(),
            ':permisoGrupoClase' => $permisos->getPermisoGrupoClase(),
            ':permisoEvaluacion' => $permisos->getPermisoEvaluacion(),
            ':idAsignatura' => $permisos->getIdAsignatura(),
            ':emailProfesor' => $permisos->getEmailProfesor()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deletePermisos($idPermiso)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM permisos WHERE IdPermiso = :idPermiso";
        $values = array(':idPermiso' => $idPermiso);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }


    public static function findPermisosPorProfesor($emailProfesor)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM permisos WHERE EmailProfesor = :emailProfesor";
        $values = array(':emailProfesor' => $emailProfesor);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findPermisosPorProfesorYAsignatura($emailProfesor, $idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM permisos WHERE EmailProfesor = :emailProfesor AND IdAsignatura = :idAsignatura";
        $values = array(':emailProfesor' => $emailProfesor, ':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
}
