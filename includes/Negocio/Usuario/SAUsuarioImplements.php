<?php

namespace es\ucm;

require_once('includes/Negocio/Usuario/SAUsuario.php');
require_once('includes/Negocio/Usuario/Usuario.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAUsuarioImplements implements SAUsuario
{

    public static function findUsuario($email)
    {
        $factoriaDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario = $factoriaDAO->createDAOUsuario();
        $usuario = $DAOUsuario->findUsuario($email);
        if ($usuario && count($usuario) === 1) {
            $usuario = new Usuario($usuario[0]['Email'], $usuario[0]['Password']);
        }
        else{
         $usuario   =null;
        }
        return $usuario;
    }

    public static function createUsuario($usuario)
    {
        $factoriaDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario = $factoriaDAO->createDAOUsuario();
        $usuario = $DAOUsuario->createUsuario($usuario);
        return $usuario;
    }

    public static function updateUsuario($usuario)
    {
        $factoriaDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario = $factoriaDAO->createDAOUsuario();
        $usuario = $DAOUsuario->updateUsuario($usuario);
        return $usuario;
    }

    public static function deleteUsuario($email)
    {
        $factoriaDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario = $factoriaDAO->createDAOUsuario();
        $usuario = $DAOUsuario->deleteUsuario($email);
        return $usuario;
    }
}
