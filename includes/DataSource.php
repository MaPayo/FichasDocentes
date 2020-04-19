<?php

/**
 * Clase que se utiliza para acceder a los diferentes sistemas de bases de datos
 */
namespace es\ucm;

require_once('config.php');

class DataSource{
    
    private $dsn;

    private $dbh;

    /**
     * Inicia la conexion con la BBDD
     */
    public  function __construct(){
        try{
            $this->dsn = "mysql:host=".BD_HOST.";dbname=".BD_NAME."";
            $this->dbh= new \PDO($this->dsn,BD_USER,BD_PASS);
            //$this->dbh=setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Preparar consulta y ejecutar
     */
    public function executeQuery($sql,$values){
        if(isset($this->dsn)&&isset($this->dbh)&&isset($sql)){
            $query=$this->dbh->prepare($sql);
            $query->execute($values);
            $results=$query->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        }else{
            return -1;
        }
    }



    
    
    /**
     * Realizar una consulta usando PDO
     **/
    public function ejecutarConsulta($sql="",$values=array())
    {
        if( $this->dsn != NULL && $this->dbh != NULL)
        {
            if($sql != "")
            {
                $consulta = $this->dbh->prepare($sql);
                $consulta->execute($values);
                $tabla_datos = $consulta->fetchAll(\PDO::FETCH_ASSOC);
                //Muestra los errores de la BBD (depuracion) QUITAR!!!!!
                $arr = $consulta->errorInfo();
                //print_r($arr);
                return $tabla_datos;
            }
        }
        return 0;
    }

    /**
     * Nos permite obtener un entero con el numero de tablas actualizadas
     **/
    public function executeInsertUpdateDelete($sql="",$values= array())
    {
        if( $this->dsn != NULL && $this->dbh != NULL)
        {
            if($sql != "")
            {
                $consulta = $this->dbh->prepare($sql);
                $consulta->execute($values);
                $num_tablas_afect = $consulta->rowCount();
                //Muestra los errores de la BBD (depuracion) QUITAR!!!!!
                $arr = $consulta->errorInfo();
                print_r($arr);
                return $num_tablas_afect;
            }
        }
        else
        {
            return -1;
        }
    }
}