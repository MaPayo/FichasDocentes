<?php

namespace es\ucm;

interface DAOAdministrador
{
    public static function findAdministrador($email);

    public static function createAdministrador($administrador);

    public static function updateAdministrador($administrador);

    public static function deleteAdministrador($email);

    public static function listAdministrador();
}
