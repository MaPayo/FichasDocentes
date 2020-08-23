<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorio/SAGrupoLaboratorio.php');
require_once('includes/Negocio/GrupoLaboratorio/GrupoLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoLaboratorioImplements implements SAGrupoLaboratorio
{

    public static function listGrupoLaboratorio($idAsignatura)
    {
        $arrayGrupoLaboratorio = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->listGrupoLaboratorio($idAsignatura);
        if ($grupoLaboratorio && count($grupoLaboratorio) > 0) {
            foreach ($grupoLaboratorio as $grupo) {
                $arrayGrupoLaboratorio[] = new GrupoLaboratorio($grupo['IdGrupoLab'], $grupo['Letra'], $grupo['Idioma'], $grupo['IdAsignatura']);
            }
        }
        else{
           $arrayGrupoLaboratorio =null;
        }
        return $arrayGrupoLaboratorio;
    }

    public static function findGrupoLaboratorio($idGrupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->findGrupoLaboratorio($idGrupoLaboratorio);
        if ($grupoLaboratorio && count($grupoLaboratorio) === 1) {
            $grupoLaboratorio = new GrupoLaboratorio(
                $grupoLaboratorio[0]['IdGrupoLab'],
                $grupoLaboratorio[0]['Letra'],
                $grupoLaboratorio[0]['Idioma'],
                $grupoLaboratorio[0]['IdAsignatura']
            );
        }
        else{
          $grupoLaboratorio  =null;
        }
        return $grupoLaboratorio;

    }public static function findGrupoLaboratorioLetra($comparacion)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->findGrupoLaboratorioLetra($comparacion);
        if ($grupoLaboratorio && count($grupoLaboratorio) === 1) {
            $grupoLaboratorio = new GrupoLaboratorio(
                $grupoLaboratorio[0]['IdGrupoLab'],
                $grupoLaboratorio[0]['Letra'],
                $grupoLaboratorio[0]['Idioma'],
                $grupoLaboratorio[0]['IdAsignatura']
            );
        }
        else{
          $grupoLaboratorio  =null;
        }
        return $grupoLaboratorio;
    }

    public static function createGrupoLaboratorio($grupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->createGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateGrupoLaboratorio($grupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->updateGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteGrupoLaboratorio($idGrupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio = $factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio = $DAOGrupoLaboratorio->deleteGrupoLaboratorio($idGrupoLaboratorio);
        return $grupoLaboratorio;
    }
}
