<?php

namespace es\ucm;

require_once('includes/Negocio/Permisos/SAPermisos.php');
require_once('includes/Negocio/Permisos/Permisos.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAPermisosImplements implements SAPermisos
{

    public static function findPermisos($idAsignatura)
    {
        $arrayPermisos = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permisos = $DAOPermisos->findPermisos($idAsignatura);
        if ($permisos) {
            foreach ($permisos as $permiso) {
                $arrayPermisos[] = new Permisos($permiso['IdPermiso'], $permiso['PermisoPrograma'], $permiso['PermisoCompetencias'], $permiso['PermisoMetodologia'], $permiso['PermisoBibliografia'], $permiso['PermisoGrupoLaboratorio'], $permiso['PermisoGrupoClase'], $permiso['PermisoEvaluacion'], $permiso['IdAsignatura'], $permiso['EmailProfesor']);
            }
        }
        return $arrayPermisos;
    }

    public static function findPermisosPorProfesor($emailProfesor)
    {
        $arrayPermisos = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permisos = $DAOPermisos->findPermisosPorProfesor($emailProfesor);
        if ($permisos) {
            foreach ($permisos as $permiso) {
                $arrayPermisos[] = new Permisos($permiso['IdPermiso'], $permiso['PermisoPrograma'], $permiso['PermisoCompetencias'], $permiso['PermisoMetodologia'], $permiso['PermisoBibliografia'], $permiso['PermisoGrupoLaboratorio'], $permiso['PermisoGrupoClase'], $permiso['PermisoEvaluacion'], $permiso['IdAsignatura'], $permiso['EmailProfesor']);
            }
        }
        return $arrayPermisos;
    }

    public static function createPermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->createPermisos($permiso);
        return $permiso;
    }

    public static function updatePermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->updatePermisos($permiso);
        return $permiso;
    }

    public static function deletePermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->deletePermisos($permiso);
        return $permiso;
    }
}
