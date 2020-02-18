<?php

namespace es\ucm;

require_once('includes/Integracion/Factorias/FactoriesDAO.php');
require_once('includes/Integracion/Administrador/DAOAdministradorImplements.php');
require_once('includes/Integracion/Asignatura/DAOAsignaturaImplements.php');
require_once('includes/Integracion/Bibliografia/DAOBibliografiaImplements.php');
require_once('includes/Integracion/CompetenciaAsignatura/DAOCompetenciaAsignaturaImplements.php');
require_once('includes/Integracion/Grado/DAOGradoImplements.php');
require_once('includes/Integracion/GrupoClase/DAOGrupoClaseImplements.php');
require_once('includes/Integracion/GrupoLaboratorio/DAOGrupoLaboratorioImplements.php');
require_once('includes/Integracion/HorarioClase/DAOHorarioClaseImplements.php');
require_once('includes/Integracion/HorarioLaboratorio/DAOHorarioLaboratorioImplements.php');
require_once('includes/Integracion/Laboratorio/DAOLaboratorioImplements.php');
require_once('includes/Integracion/Leyenda/DAOLeyendaImplements.php');
require_once('includes/Integracion/Metodologia/DAOMetodologiaImplements.php');
require_once('includes/Integracion/Permisos/DAOPermisosImplements.php');
require_once('includes/Integracion/Problema/DAOProblemaImplements.php');
require_once('includes/Integracion/Profesor/DAOProfesorImplements.php');
require_once('includes/Integracion/ProgramaAsignatura/DAOProgramaAsignaturaImplements.php');
require_once('includes/Integracion/Teorico/DAOTeoricoImplements.php');
require_once('includes/Integracion/Usuario/DAOUsuarioImplements.php');
require_once('includes/Integracion/Verifica/DAOVerificaImplements.php');

class FactoriesDAOImplements implements FactoriesDAO
{

   public static function createDAOAdministrador()
   {
   }
   
   public static function createDAOAsignatura()
   {
      return new DAOAsignaturaImplements();
   }

   public static function createDAOModAsignatura()
   {
      return new DAOModAsignaturaImplements();
   }

   public static function createDAOBibliografia()
   {
      return new DAOBibliografiaImplements();
   }

   public static function createDAOModBibliografia()
   {
      return new DAOModBibliografiaImplements();
   }

   public static function createDAOCompetenciaAsignatura()
   {
      return new DAOCompetenciaAsignaturaImplements();
   }

   public static function createDAOModCompetenciaAsignatura()
   {
      return new DAOModCompetenciaAsignaturaImplements();
   }

   public static function createDAOConfiguracion()
   {
      return new DAOConfiguracionImplements();
   }

   public static function createDAOEvaluacion()
   {
      return new DAOEvaluacionImplements();
   }

   public static function createDAOModEvaluacion()
   {
      return new DAOModEvaluacionImplements();
   }

   public static function createDAOGrado()
   {
      return new DAOGradoImplements();
   }

   public static function createDAOGrupoClase()
   {
      return new DAOGrupoClaseImplements();
   }

   public static function createDAOModGrupoClase()
   {
      return new DAOModGrupoClaseImplements();
   }

   public static function createDAOGrupoLaboratorio()
   {
      return new DAOGrupoLaboratorioImplements();
   }

   public static function createDAOModGrupoLaboratorio()
   {
      return new DAOModGrupoLaboratorioImplements();
   }

   public static function createDAOHorarioClase()
   {
      return new DAOHorarioClaseImplements();
   }

   public static function createDAOModHorarioClase()
   {
      return new DAOModHorarioClaseImplements();
   }

   public static function createDAOHorarioLaboratorio()
   {
      return new DAOHorarioLaboratorioImplements();
   }

   public static function createDAOModHorarioLaboratorio()
   {
      return new DAOModHorarioLaboratorioImplements();
   }

   public static function createDAOLaboratorio()
   {
      return new DAOLaboratorioImplements();
   }

   public static function createDAOLeyenda()
   {
      return new DAOLeyendaImplements();
   }

   public static function createDAOMetodologia()
   {
      return new DAOMetodologiaImplements();
   }

   public static function createDAOModMetodologia()
   {
      return new DAOModMetodologiaImplements();
   }

   public static function createDAOPermisos()
   {
      return new DAOPermisosImplements();
   }

   public static function createDAOProblema()
   {
      return new DAOProblemaImplements();
   }

   public static function createDAOProfesor()
   {
      return new DAOProfesorImplements();
   }

   public static function createDAOProgramaAsignatura()
   {
      return new DAOProgramaAsignaturaImplements();
   }

   public static function createDAOModProgramaAsignatura()
   {
      return new DAOModProgramaAsignaturaImplements();
   }

   public static function createDAOTeorico()
   {
      return new DAOTeoricoImplements();
   }

   public static function createDAOUsuario()
   {
      return new DAOUsuarioImplements();
   }

   public static function createDAOVerifica()
   {
      return new DAOVerificaImplements();
   }
}
