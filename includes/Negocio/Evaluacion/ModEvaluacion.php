<?php

namespace es\ucm;

class ModEvaluacion
{
    private $IdEvaluacion;
    private $RealizacionExamenes;
    private $RealizacionExamenesI;
    private $PesoExamenes;
    private $CalificacionFinal;
    private $CalificacionFinalI;
    private $RealizacionActividades;
    private $RealizacionActividadesI;
    private $PesoActividades;
    private $RealizacionLaboratorio;
    private $RealizacionLaboratorioI;
    private $PesoLaboratorio;
<<<<<<< Updated upstream
    private $IdModAsignatura;

    public function __construct($IdEvaluacion, $RealizacionExamenes, $RealizacionExamenesI, $PesoExamenes, $CalificacionFinal, $CalificacionFinalI, $RealizacionActividades, $RealizacionActividadesI, $PesoActividades, $RealizacionLaboratorio, $RealizacionLaboratorioI, $PesoLaboratorio, $IdModAsignatura)
=======
    private $CalificacionFinal;
    private $CalificacionFinalI;
    private $IdModAsignatura;

    public function __construct($IdEvaluacion, $RealizacionExamenes, $RealizacionExamenesI, $PesoExamenes, $RealizacionActividades, $RealizacionActividadesI, $PesoActividades, $RealizacionLaboratorio, $RealizacionLaboratorioI, $PesoLaboratorio, $CalificacionFinal, $CalificacionFinalI, $IdModAsignatura)
>>>>>>> Stashed changes
    {
        $this->IdEvaluacion = $IdEvaluacion;
        $this->RealizacionExamenes = $RealizacionExamenes;
        $this->RealizacionExamenesI = $RealizacionExamenesI;
        $this->PesoExamenes = $PesoExamenes;
        $this->CalificacionFinal = $CalificacionFinal;
        $this->CalificacionFinalI = $CalificacionFinalI;
        $this->RealizacionActividades = $RealizacionActividades;
        $this->RealizacionActividadesI = $RealizacionActividadesI;
        $this->PesoActividades = $PesoActividades;
        $this->RealizacionLaboratorio = $RealizacionLaboratorio;
        $this->RealizacionLaboratorioI = $RealizacionLaboratorioI;
        $this->PesoLaboratorio = $PesoLaboratorio;
<<<<<<< Updated upstream
=======
        $this->CalificacionFinal = $CalificacionFinal;
        $this->CalificacionFinalI = $CalificacionFinalI;
>>>>>>> Stashed changes
        $this->IdModAsignatura = $IdModAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdEvaluacion()
    {
        return $this->IdEvaluacion;
    }

    /**
     * @param mixed $IdEvaluacion
     *
     * @return self
     */
    public function setIdEvaluacion($IdEvaluacion)
    {
        $this->IdEvaluacion = $IdEvaluacion;

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
    public function getRealizacionExamenesI()
    {
        return $this->RealizacionExamenesI;
    }

    /**
     * @param mixed $RealizacionExamenesI
     *
     * @return self
     */
    public function setRealizacionExamenesI($RealizacionExamenesI)
    {
        $this->RealizacionExamenesI = $RealizacionExamenesI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesoExamenes()
    {
        return $this->PesoExamenes;
    }

    /**
     * @param mixed $PesoExamenes
     *
     * @return self
     */
    public function setPesoExamenes($PesoExamenes)
    {
        $this->PesoExamenes = $PesoExamenes;

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
    public function getCalificacionFinalI()
    {
        return $this->CalificacionFinalI;
    }

    /**
     * @param mixed $CalificacionFinalI
     *
     * @return self
     */
    public function setCalificacionFinalI($CalificacionFinalI)
    {
        $this->CalificacionFinalI = $CalificacionFinalI;

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
    public function getRealizacionActividadesI()
    {
        return $this->RealizacionActividadesI;
    }

    /**
     * @param mixed $RealizacionActividadesI
     *
     * @return self
     */
    public function setRealizacionActividadesI($RealizacionActividadesI)
    {
        $this->RealizacionActividadesI = $RealizacionActividadesI;

        return $this;
    }

    /**
     * @return mixed
     */
<<<<<<< Updated upstream
    public function getPesoActividades()
    {
        return $this->PesoActividades;
    }

    /**
     * @param mixed $PesoActividades
     *
     * @return self
     */
    public function setPesoActividades($PesoActividades)
    {
        $this->PesoActividades = $PesoActividades;
=======
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
>>>>>>> Stashed changes

        return $this;
    }

    /**
     * @return mixed
     */
<<<<<<< Updated upstream
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
    public function getRealizacionLaboratorioI()
    {
        return $this->RealizacionLaboratorioI;
    }

    /**
     * @param mixed $RealizacionLaboratorioI
     *
     * @return self
     */
    public function setRealizacionLaboratorioI($RealizacionLaboratorioI)
    {
        $this->RealizacionLaboratorioI = $RealizacionLaboratorioI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPesoLaboratorio()
    {
        return $this->PesoLaboratorio;
    }

    /**
     * @param mixed $PesoLaboratorio
     *
     * @return self
     */
    public function setPesoLaboratorio($PesoLaboratorio)
    {
        $this->PesoLaboratorio = $PesoLaboratorio;
=======
    public function getCalificacionFinalI()
    {
        return $this->CalificacionFinalI;
    }

    /**
     * @param mixed $CalificacionFinalI
     *
     * @return self
     */
    public function setCalificacionFinalI($CalificacionFinalI)
    {
        $this->CalificacionFinalI = $CalificacionFinalI;
>>>>>>> Stashed changes

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdModAsignatura()
    {
        return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdModAsignatura($IdModAsignatura)
    {
        $this->IdModAsignatura = $IdModAsignatura;

        return $this;
    }
}
