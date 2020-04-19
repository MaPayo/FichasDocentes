<?php
namespace es\ucm;

class GrupoLaboratorioProfesor{
	private $IdGrupoClase;
    private $EmailProfesor;

    public function __construct($IdGrupoClase,$EmailProfesor){
      $this->IdGrupoClase = $IdGrupoClase;
      $this->EmailProfesor=$EmailProfesor;
  }

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