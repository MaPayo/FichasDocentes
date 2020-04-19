<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorio/SAModGrupoLaboratorio.php');
require_once('includes/Negocio/GrupoLaboratorio/GrupoLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoLaboratorioImplements implements SAModGrupoLaboratorio
{

    public static function listModGrupoLaboratorio($idModAsignatura)
    {
        $arrayGrupoLaboratorio = array();
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio = $factoriesDAO->createDAOModGrupoLaboratorio();
        $grupoLaboratorio = $DAOModGrupoLaboratorio->listModGrupoLaboratorio($idModAsignatura);
        if ($grupoLaboratorio && count($grupoLaboratorio) > 0) {
            foreach ($grupoLaboratorio as $grupo) {
                $arrayGrupoLaboratorio[] = new GrupoLaboratorio($grupo['IdGrupoLab'], $grupo['Letra'], $grupo['Idioma'], $grupo['IdModAsignatura']);
            }
        }
        return $arrayGrupoLaboratorio;
    }

    public static function findModGrupoLaboratorio($idGrupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio = $factoriesDAO->createDAOModGrupoLaboratorio();
        $grupoLaboratorio = $DAOModGrupoLaboratorio->findModGrupoLaboratorio($idGrupoLaboratorio);
        if ($grupoLaboratorio && count($grupoLaboratorio) === 1) {
            $grupoLaboratorio = new GrupoLaboratorio(
                $grupoLaboratorio[0]['IdGrupoLab'],
                $grupoLaboratorio[0]['Letra'],
                $grupoLaboratorio[0]['Idioma'],
                $grupoLaboratorio[0]['IdModAsignatura']
            );
        }
        return $grupoLaboratorio;
    }

    public static function createModGrupoLaboratorio($grupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio = $factoriesDAO->createDAOModGrupoLaboratorio();
        $grupoLaboratorio = $DAOModGrupoLaboratorio->createModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateModGrupoLaboratorio($grupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio = $factoriesDAO->createDAOModGrupoLaboratorio();
        $grupoLaboratorio = $DAOModGrupoLaboratorio->updateModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteModGrupoLaboratorio($idGrupoLaboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio = $factoriesDAO->createDAOModGrupoLaboratorio();
        $grupoLaboratorio = $DAOModGrupoLaboratorio->deleteModGrupoLaboratorio($idGrupoLaboratorio);
        return $grupoLaboratorio;
    }
}
