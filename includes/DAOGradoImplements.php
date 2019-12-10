<?php
namespace es\ucm;

class DAOGradoImplements implements DAOGrado{


    public static function findGrado($codigoGrado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM grado WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $codigoGrado);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createGrado($grado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO grado (CodigoGrado,NombreGrado,HorasEtcs) 
        VALUES (:codigoGrado, :nombreGrado, :horasEtcs)";
        $values=array(':codigoGrado' => $grado->getCodigoGrado(),
            ':nombreGrado' => $grado->getNombreGrado(),
            ':horasEtcs' => $grado->getHorasEtcs());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateGrado($grado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE grado SET CodigoGrado = :codigoGrado, NombreGrado = :nombreGrado,HorasEtcs = :horasEtcs WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $grado->getCodigoGrado(),
            ':nombreGrado' => $grado->getNombreGrado(),
            ':horasEtcs' => $grado->getHorasEtcs());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteGrado($codigoGrado){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM grado WHERE CodigoGrado = :codigoGrado";
        $values=array(':codigoGrado' => $codigoGrado);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}