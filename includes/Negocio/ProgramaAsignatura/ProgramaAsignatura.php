<?php

namespace es\ucm;

class ProgramaAsignatura
{
    private $IdPrograma;
    private $ConocimientosPrevios;
    private $ConocimientosPreviosI;
    private $BreveDescripcion;
    private $BreveDescripcionI;
    private $ProgramaTeorico;
    private $ProgramaTeoricoI;
    private $ProgramaSeminarios;
    private $ProgramaSeminariosI;
    private $ProgramaLaboratorio;
    private $ProgramaLaboratorioI;
    private $Influencia;
    private $InfluenciaI;
    private $IdAsignatura;

    public function __construct($IdPrograma, $ConocimientosPrevios, $ConocimientosPreviosI, $BreveDescripcion, $BreveDescripcionI, $ProgramaTeorico, $ProgramaTeoricoI, $ProgramaSeminarios, $ProgramaSeminariosI, $ProgramaLaboratorio, $ProgramaLaboratorioI, $Influencia, $InfluenciaI, $IdAsignatura)
    {
        $this->IdPrograma = $IdPrograma;
        $this->ConocimientosPrevios = $ConocimientosPrevios;
        $this->ConocimientosPreviosI = $ConocimientosPreviosI;
        $this->BreveDescripcion = $BreveDescripcion;
        $this->BreveDescripcionI = $BreveDescripcionI;
        $this->ProgramaTeorico = $ProgramaTeorico;
        $this->ProgramaTeoricoI = $ProgramaTeoricoI;
        $this->ProgramaSeminarios = $ProgramaSeminarios;
        $this->ProgramaSeminariosI = $ProgramaSeminariosI;
        $this->ProgramaLaboratorio = $ProgramaLaboratorio;
        $this->ProgramaLaboratorioI = $ProgramaLaboratorioI;
        $this->Influencia = $Influencia;
        $this->InfluenciaI = $InfluenciaI;
        $this->IdAsignatura = $IdAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdPrograma()
    {
        return $this->IdPrograma;
    }

    /**
     * @param mixed $IdPrograma
     *
     * @return self
     */
    public function setIdPrograma($IdPrograma)
    {
        $this->IdPrograma = $IdPrograma;

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
    public function getConocimientosPreviosI()
    {
        return $this->ConocimientosPreviosI;
    }

    /**
     * @param mixed $ConocimientosPreviosI
     *
     * @return self
     */
    public function setConocimientosPreviosI($ConocimientosPreviosI)
    {
        $this->ConocimientosPreviosI = $ConocimientosPreviosI;

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
    public function getBreveDescripcionI()
    {
        return $this->BreveDescripcionI;
    }

    /**
     * @param mixed $BreveDescripcionI
     *
     * @return self
     */
    public function setBreveDescripcionI($BreveDescripcionI)
    {
        $this->BreveDescripcionI = $BreveDescripcionI;

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
    public function getProgramaTeoricoI()
    {
        return $this->ProgramaTeoricoI;
    }

    /**
     * @param mixed $ProgramaTeoricoI
     *
     * @return self
     */
    public function setProgramaTeoricoI($ProgramaTeoricoI)
    {
        $this->ProgramaTeoricoI = $ProgramaTeoricoI;

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
    public function getProgramaSeminariosI()
    {
        return $this->ProgramaSeminariosI;
    }

    /**
     * @param mixed $ProgramaSeminariosI
     *
     * @return self
     */
    public function setProgramaSeminariosI($ProgramaSeminariosI)
    {
        $this->ProgramaSeminariosI = $ProgramaSeminariosI;

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
    public function getProgramaLaboratorioI()
    {
        return $this->ProgramaLaboratorioI;
    }

    /**
     * @param mixed $ProgramaLaboratorioI
     *
     * @return self
     */
    public function setProgramaLaboratorioI($ProgramaLaboratorioI)
    {
        $this->ProgramaLaboratorioI = $ProgramaLaboratorioI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfluencia()
    {
        return $this->Influencia;
    }

    /**
     * @param mixed $Influencia
     *
     * @return self
     */
    public function setInfluencia($Influencia)
    {
        $this->Influencia = $Influencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfluenciaI()
    {
        return $this->InfluenciaI;
    }

    /**
     * @param mixed $InfluenciaI
     *
     * @return self
     */
    public function setInfluenciaI($InfluenciaI)
    {
        $this->InfluenciaI = $InfluenciaI;

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
