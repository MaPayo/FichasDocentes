<?php

namespace es\ucm;

class ModProgramaAsignatura
{
    private $IdPrograma;
    private $ConocimientosPrevios;
    private $ConocimientosPreviosI;
    private $BreveDescripcion;
    private $BreveDescripcionI;
<<<<<<< Updated upstream
    private $ProgramaDetallado;
    private $ProgramaDetalladoI;
    private $IdModAsignatura;

    public function __construct($IdPrograma, $ConocimientosPrevios, $ConocimientosPreviosI, $BreveDescripcion, $BreveDescripcionI, $ProgramaDetallado, $ProgramaDetalladoI, $IdModAsignatura)
=======
    private $ProgramaTeorico;
    private $ProgramaTeoricoI;
    private $ProgramaSeminarios;
    private $ProgramaSeminariosI;
    private $ProgramaLaboratorio;
    private $ProgramaLaboratorioI;
    private $IdModAsignatura;

    public function __construct($IdPrograma, $ConocimientosPrevios, $ConocimientosPreviosI, $BreveDescripcion, $BreveDescripcionI, $ProgramaTeorico, $ProgramaTeoricoI, $ProgramaSeminarios, $ProgramaSeminariosI, $ProgramaLaboratorio, $ProgramaLaboratorioI,$IdModAsignatura)
>>>>>>> Stashed changes
    {
        $this->IdPrograma = $IdPrograma;
        $this->ConocimientosPrevios = $ConocimientosPrevios;
        $this->ConocimientosPreviosI = $ConocimientosPreviosI;
        $this->BreveDescripcion = $BreveDescripcion;
        $this->BreveDescripcionI = $BreveDescripcionI;
<<<<<<< Updated upstream
        $this->ProgramaDetallado = $ProgramaDetallado;
        $this->ProgramaDetalladoI = $ProgramaDetalladoI;
=======
        $this->ProgramaTeorico = $ProgramaTeorico;
        $this->ProgramaTeoricoI = $ProgramaTeoricoI;
        $this->ProgramaSeminarios = $ProgramaSeminarios;
        $this->ProgramaSeminariosI = $ProgramaSeminariosI;
        $this->ProgramaLaboratorio = $ProgramaLaboratorio;
        $this->ProgramaLaboratorioI = $ProgramaLaboratorioI;
>>>>>>> Stashed changes
        $this->IdModAsignatura = $IdModAsignatura;
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
    public function getProgramaDetallado()
    {
        return $this->ProgramaDetallado;
    }

    /**
     * @param mixed $ProgramaDetallado
     *
     * @return self
     */
    public function setProgramaDetallado($ProgramaDetallado)
    {
        $this->ProgramaDetallado = $ProgramaDetallado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaDetalladoI()
    {
        return $this->ProgramaDetalladoI;
    }

    /**
     * @param mixed $ProgramaDetalladoI
     *
     * @return self
     */
    public function setProgramaDetalladoI($ProgramaDetalladoI)
    {
<<<<<<< Updated upstream
        $this->ProgramaDetalladoI = $ProgramaDetalladoI;
=======
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
>>>>>>> Stashed changes

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
        return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdModAsignatura)
    {
        $this->IdModAsignatura = $IdModAsignatura;

        return $this;
    }
}
