<?php
namespace es\ucm;

<<<<<<< Updated upstream
class GrupoClaseProfesor{
	private $IdGrupoClase;
    private $EmailProfesor;

    public function __construct($IdGrupoClase,$EmailProfesor){
      $this->IdGrupoClase = $IdGrupoClase;
      $this->EmailProfesor=$EmailProfesor;
  }
=======
class GrupoClaseProfesor
{
    private $IdGrupoClase;
    private $Tipo;
    private $Fechas;
    private $EmailProfesor;

    public function __construct($IdGrupoClase, $Tipo, $Fechas, $EmailProfesor)
    {
        $this->IdGrupoClase = $IdGrupoClase;
        $this->Tipo = $Tipo;
        $this->Fechas = $Fechas;
        $this->EmailProfesor = $EmailProfesor;
    }
>>>>>>> Stashed changes

    /**
     * @return mixed
     */
    public function getIdGrupoClase()
    {
        return $this->IdGrupoClase;
    }

    /**
     * @param mixed $IdGrupoClase
     *
     * @return self
     */
    public function setIdGrupoClase($IdGrupoClase)
    {
        $this->IdGrupoClase = $IdGrupoClase;

        return $this;
    }

    /**
     * @return mixed
     */
<<<<<<< Updated upstream
=======
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param mixed $Tipo
     *
     * @return self
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechas()
    {
        return $this->Fechas;
    }

    /**
     * @param mixed $Fechas
     *
     * @return self
     */
    public function setFechas($Fechas)
    {
        $this->Fechas = $Fechas;

        return $this;
    }

    /**
     * @return mixed
     */
>>>>>>> Stashed changes
    public function getEmailProfesor()
    {
        return $this->EmailProfesor;
    }

    /**
     * @param mixed $EmailProfesor
     *
     * @return self
     */
    public function setEmailProfesor($EmailProfesor)
    {
        $this->EmailProfesor = $EmailProfesor;

        return $this;
    }
}