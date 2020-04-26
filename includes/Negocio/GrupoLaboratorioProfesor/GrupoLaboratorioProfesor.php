<?php

namespace es\ucm;

class GrupoLaboratorioProfesor
{
    private $IdGrupoLab;
    private $EmailProfesor;
    public function __construct($IdGrupoLaboratorio, $EmailProfesor)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;
        $this->EmailProfesor = $EmailProfesor;
    }

    /**
     * @return mixed
     */
    public function getIdGrupoLab()
    {
        return $this->IdGrupoLab;
    }

    /**
     * @param mixed $IdGrupoLab
     *
     * @return self
     */
    public function setIdGrupoLab($IdGrupoLaboratorio)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;

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
