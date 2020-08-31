<?php

namespace es\ucm;

class Configuracion
{
    private $IdConfiguracion;
    private $ConocimientosPrevios;
    private $BreveDescripcion;
    private $ProgramaTeorico;
    private $ProgramaSeminarios;
    private $ProgramaLaboratorio;
    private $ComGenerales;
    private $ComEspecificas;
    private $ComBasicas;
    private $ResultadosAprendizaje;
    private $Metodologia;
    private $CitasBibliograficas;
    private $RecursosInternet;
    private $GrupoLaboratorio;
    private $RealizacionExamenes;
    private $RealizacionActividades;
    private $RealizacionLaboratorio;
    private $CalificacionFinal;
    private $IdAsignatura;

    public function __construct($IdConfiguracion, $ConocimientosPrevios, $BreveDescripcion, $ProgramaTeorico, $ProgramaSeminarios, $ProgramaLaboratorio, $ComGenerales, $ComEspecificas, $ComBasicas, $ResultadosAprendizaje, $Metodologia, $CitasBibliograficas, $RecursosInternet, $GrupoLaboratorio, $RealizacionExamenes, $RealizacionActividades, $RealizacionLaboratorio, $CalificacionFinal, $IdAsignatura)
    {

        $this->IdConfiguracion = $IdConfiguracion;
        $this->ConocimientosPrevios = $ConocimientosPrevios;
        $this->BreveDescripcion = $BreveDescripcion;
        $this->ProgramaTeorico = $ProgramaTeorico;
        $this->ProgramaSeminarios = $ProgramaSeminarios;
        $this->ProgramaLaboratorio = $ProgramaLaboratorio;
        $this->ComGenerales = $ComGenerales;
        $this->ComEspecificas = $ComEspecificas;
        $this->ComBasicas = $ComBasicas;
        $this->ResultadosAprendizaje = $ResultadosAprendizaje;
        $this->Metodologia = $Metodologia;
        $this->CitasBibliograficas = $CitasBibliograficas;
        $this->RecursosInternet = $RecursosInternet;
        $this->GrupoLaboratorio=$GrupoLaboratorio;
        $this->RealizacionExamenes = $RealizacionExamenes;
        $this->RealizacionActividades = $RealizacionActividades;
        $this->RealizacionLaboratorio = $RealizacionLaboratorio;
        $this->CalificacionFinal = $CalificacionFinal;
        $this->IdAsignatura = $IdAsignatura;
    }
    /**
     * @return mixed
     */
    public function getIdConfiguracion()
    {
        return $this->IdConfiguracion;
    }

    /**
     * @param mixed $IdConfiguracion
     *
     * @return self
     */
    public function setIdConfiguracion($IdConfiguracion)
    {
        $this->IdConfiguracion = $IdConfiguracion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConocimientosPrevios()
    {
        return $this->ConocimientosPrevios;
    }

    /**
     * @param mixed $ConocimientosPrevios
     *
     * @return self
     */
    public function setConocimientosPrevios($ConocimientosPrevios)
    {
        $this->ConocimientosPrevios = $ConocimientosPrevios;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBreveDescripcion()
    {
        return $this->BreveDescripcion;
    }

    /**
     * @param mixed $BreveDescripcion
     *
     * @return self
     */
    public function setBreveDescripcion($BreveDescripcion)
    {
        $this->BreveDescripcion = $BreveDescripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaTeorico()
    {
        return $this->ProgramaTeorico;
    }

    /**
     * @param mixed $ProgramaTeorico
     *
     * @return self
     */
    public function setProgramaTeorico($ProgramaTeorico)
    {
        $this->ProgramaTeorico = $ProgramaTeorico;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaSeminarios()
    {
        return $this->ProgramaSeminarios;
    }

    /**
     * @param mixed $ProgramaSeminarios
     *
     * @return self
     */
    public function setProgramaSeminarios($ProgramaSeminarios)
    {
        $this->ProgramaSeminarios = $ProgramaSeminarios;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaLaboratorio()
    {
        return $this->ProgramaLaboratorio;
    }

    /**
     * @param mixed $ProgramaLaboratorio
     *
     * @return self
     */
    public function setProgramaLaboratorio($ProgramaLaboratorio)
    {
        $this->ProgramaLaboratorio = $ProgramaLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComGenerales()
    {
        return $this->ComGenerales;
    }

    /**
     * @param mixed $ComGenerales
     *
     * @return self
     */
    public function setComGenerales($ComGenerales)
    {
        $this->ComGenerales = $ComGenerales;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComEspecificas()
    {
        return $this->ComEspecificas;
    }

    /**
     * @param mixed $ComEspecificas
     *
     * @return self
     */
    public function setComEspecificas($ComEspecificas)
    {
        $this->ComEspecificas = $ComEspecificas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComBasicas()
    {
        return $this->ComBasicas;
    }

    /**
     * @param mixed $ComBasicas
     *
     * @return self
     */
    public function setComBasicas($ComBasicas)
    {
        $this->ComBasicas = $ComBasicas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadosAprendizaje()
    {
        return $this->ResultadosAprendizaje;
    }

    /**
     * @param mixed $ResultadosAprendizaje
     *
     * @return self
     */
    public function setResultadosAprendizaje($ResultadosAprendizaje)
    {
        $this->ResultadosAprendizaje = $ResultadosAprendizaje;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodologia()
    {
        return $this->Metodologia;
    }

    /**
     * @param mixed $Metodologia
     *
     * @return self
     */
    public function setMetodologia($Metodologia)
    {
        $this->Metodologia = $Metodologia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCitasBibliograficas()
    {
        return $this->CitasBibliograficas;
    }

    /**
     * @param mixed $CitasBibliograficas
     *
     * @return self
     */
    public function setCitasBibliograficas($CitasBibliograficas)
    {
        $this->CitasBibliograficas = $CitasBibliograficas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecursosInternet()
    {
        return $this->RecursosInternet;
    }

    /**
     * @param mixed $RecursosInternet
     *
     * @return self
     */
    public function setRecursosInternet($RecursosInternet)
    {
        $this->RecursosInternet = $RecursosInternet;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupoLaboratorio()
    {
        return $this->GrupoLaboratorio;
    }

    /**
     * @param mixed $GrupoLaboratorio
     *
     * @return self
     */
    public function setGrupoLaboratorio($GrupoLaboratorio)
    {
        $this->GrupoLaboratorio = $GrupoLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionExamenes()
    {
        return $this->RealizacionExamenes;
    }

    /**
     * @param mixed $RealizacionExamenes
     *
     * @return self
     */
    public function setRealizacionExamenes($RealizacionExamenes)
    {
        $this->RealizacionExamenes = $RealizacionExamenes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionActividades()
    {
        return $this->RealizacionActividades;
    }

    /**
     * @param mixed $RealizacionActividades
     *
     * @return self
     */
    public function setRealizacionActividades($RealizacionActividades)
    {
        $this->RealizacionActividades = $RealizacionActividades;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealizacionLaboratorio()
    {
        return $this->RealizacionLaboratorio;
    }

    /**
     * @param mixed $RealizacionLaboratorio
     *
     * @return self
     */
    public function setRealizacionLaboratorio($RealizacionLaboratorio)
    {
        $this->RealizacionLaboratorio = $RealizacionLaboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalificacionFinal()
    {
        return $this->CalificacionFinal;
    }

    /**
     * @param mixed $CalificacionFinal
     *
     * @return self
     */
    public function setCalificacionFinal($CalificacionFinal)
    {
        $this->CalificacionFinal = $CalificacionFinal;

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
}
