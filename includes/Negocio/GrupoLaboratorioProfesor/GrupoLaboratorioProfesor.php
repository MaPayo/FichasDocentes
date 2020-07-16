<?php

namespace es\ucm;

class GrupoLaboratorioProfesor
{
    private $IdGrupoLab;
<<<<<<< Updated upstream
    private $EmailProfesor;
    public function __construct($IdGrupoLaboratorio, $EmailProfesor)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;
=======
    private $Fechas;
    private $EmailProfesor;
    
    public function __construct($IdGrupoLaboratorio, $Fechas, $EmailProfesor)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;
        $this->Fechas = $Fechas;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======

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

>>>>>>> Stashed changes
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
