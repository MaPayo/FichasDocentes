<?php

namespace es\ucm;

class Permisos
{
    private $IdPermiso;
    private $PermisoPrograma;
    private $PermisoCompetencias;
    private $PermisoMetodologia;
    private $PermisoBibliografia;
    private $PermisoGrupoLaboratorio;
    private $PermisoGrupoClase;
    private $PermisoEvaluacion;
    private $IdAsignatura;
    private $EmailProfesor;

    public function __construct($IdPermiso, $PermisoPrograma, $PermisoCompetencias, $PermisoMetodologia, $PermisoBibliografia, $PermisoGrupoLaboratorio, $PermisoGrupoClase, $PermisoEvaluacion, $IdAsignatura, $EmailProfesor)
    {
        $this->IdPermiso = $IdPermiso;
        $this->PermisoPrograma =  $PermisoPrograma;
        $this->PermisoCompetencias = $PermisoCompetencias;
        $this->PermisoMetodologia = $PermisoMetodologia;
        $this->PermisoBibliografia = $PermisoBibliografia;
        $this->PermisoGrupoLaboratorio = $PermisoGrupoLaboratorio;
        $this->PermisoGrupoClase = $PermisoGrupoClase;
        $this->PermisoEvaluacion = $PermisoEvaluacion;
        $this->IdAsignatura = $IdAsignatura;
        $this->EmailProfesor = $EmailProfesor;
    }


    /**
     * @return mixed
     */
    public function getIdPermiso()
    {
        return $this->IdPermiso;
    }

    /**
     * @param mixed $IdPermiso
     *
     * @return self
     */
    public function setIdPermiso($IdPermiso)
    {
        $this->IdPermiso = $IdPermiso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoPrograma()
    {
        return $this->PermisoPrograma;
    }

    /**
     * @param mixed $PermisoPrograma
     *
     * @return self
     */
    public function setPermisoPrograma($PermisoPrograma)
    {
        $this->PermisoPrograma = $PermisoPrograma;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoCompetencias()
    {
        return $this->PermisoCompetencias;
    }

    /**
     * @param mixed $PermisoCompetencias
     *
     * @return self
     */
    public function setPermisoCompetencias($PermisoCompetencias)
    {
        $this->PermisoCompetencias = $PermisoCompetencias;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoMetodologia()
    {
        return $this->PermisoMetodologia;
    }

    /**
     * @param mixed $PermisoMetodologia
     *
     * @return self
     */
    public function setPermisoMetodologia($PermisoMetodologia)
    {
        $this->PermisoMetodologia = $PermisoMetodologia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoBibliografia()
    {
        return $this->PermisoBibliografia;
    }

    /**
     * @param mixed $PermisoBibliografia
     *
     * @return self
     */
    public function setPermisoBibliografia($PermisoBibliografia)
    {
        $this->PermisoBibliografia = $PermisoBibliografia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoGrupoLaboratorio()
    {
        return $this->PermisoGrupoLaboratorio;
    }

    /**
     * @param mixed $PermisoGrupoLaboratorio
     *
     * @return self
     */
    public function setPermisoGrupoLaboratorio($PermisoGrupoLaboratorio)
    {
        $this->PermisoGrupoLaboratorio = $PermisoGrupoLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoGrupoClase()
    {
        return $this->PermisoGrupoClase;
    }

    /**
     * @param mixed $PermisoGrupoClase
     *
     * @return self
     */
    public function setPermisoGrupoClase($PermisoGrupoClase)
    {
        $this->PermisoGrupoClase = $PermisoGrupoClase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermisoEvaluacion()
    {
        return $this->PermisoEvaluacion;
    }

    /**
     * @param mixed $PermisoEvaluacion
     *
     * @return self
     */
    public function setPermisoEvaluacion($PermisoEvaluacion)
    {
        $this->PermisoEvaluacion = $PermisoEvaluacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
        return $this->IdAsignatura;
    }

    /**
     * @param mixed $IdAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdAsignatura)
    {
        $this->IdAsignatura = $IdAsignatura;

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
