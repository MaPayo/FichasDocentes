<?php

namespace es\ucm;

class FormProgramaAsignatura extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idPrograma = isset($datosIniciales['idPrograma']) ? $datosIniciales['idPrograma'] : null;
		$conocimientosPrevios = isset($datosIniciales['conocimientosPrevios']) ? $datosIniciales['conocimientosPrevios'] : null;
		$conocimientosPreviosI = isset($datosIniciales['conocimientosPreviosI']) ? $datosIniciales['conocimientosPreviosI'] : null;
		$breveDescripcion = isset($datosIniciales['breveDescripcion']) ? $datosIniciales['breveDescripcion'] : null;
		$breveDescripcionI = isset($datosIniciales['breveDescripcionI']) ? $datosIniciales['breveDescripcionI'] : null;
		$programaDetallado = isset($datosIniciales['programaDetallado']) ? $datosIniciales['programaDetallado'] : null;
		$programaDetalladoI = isset($datosIniciales['programaDetalladoI']) ? $datosIniciales['programaDetalladoI'] : null;


		$html = '<div class="form-group">
					<label for="conocimientosPrevios">Conocimientos previos</label>
					<textarea class="form-control" id="conocimientosPrevios" rows="3" name="conocimientosPrevios" >' . $conocimientosPrevios . '</textarea>
				  </div>

				  <div class="form-group">
					<label for="conocimientosPreviosI">Conocimientos previos (Ingles)</label>
					<textarea class="form-control" id="conocimientosPreviosI" rows="3" name="conocimientosPreviosI" >' . $conocimientosPreviosI . '</textarea>
				  </div>

				  <div class="form-group">
					<label for="breveDescripcion">Breve descripción</label>
					<textarea class="form-control" id="breveDescripcion" rows="3" name="breveDescripcion" >' . $breveDescripcion . '</textarea>
				  </div>

				  <div class="form-group">
					<label for="breveDescripcionI">Breve descripcion (Ingles)</label>
					<textarea class="form-control" id="breveDescripcionI" rows="3" name="breveDescripcionI" >' . $breveDescripcionI . '</textarea>
				  </div>

				  <div class="form-group">
					<label for="programaDetallado">Programa detallado</label>
					<textarea class="form-control" id="programaDetallado" rows="3" name="programaDetallado" >' . $programaDetallado . '</textarea>
				  </div>

				  <div class="form-group">
					<label for="programaDetalladoI">Programa detallado (Ingles)</label>
					<textarea class="form-control" id="programaDetalladoI" rows="3" name="programaDetalladoI" >' . $programaDetalladoI . '</textarea>
				  </div>
				  
				  <div class="text-center">';
		if (isset($datosIniciales['modificar']) && $datosIniciales['modificar'] === "y") {
			$html .= '<button type="submit" class="btn btn-success" name="modificar">Modificar</button>';
		} else {
			$html .= '<button type="submit" class="btn btn-success" name="registrar">Registrar</button>';
		}
		$html .= '</div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{

		$erroresFormulario = array();

		$conocimientosPrevios = isset($datos['conocimientosPrevios']) ? $datos['conocimientosPrevios'] : null;
		$conocimientosPrevios = self::clean($conocimientosPrevios);
		if (empty($conocimientosPrevios)) {
			$erroresFormulario[] = "No has introducido los conocimientos previos.";
		}

		$conocimientosPreviosI = isset($datos['conocimientosPreviosI']) ? $datos['conocimientosPreviosI'] : null;
		$conocimientosPreviosI = self::clean($conocimientosPreviosI);
		if (empty($conocimientosPreviosI)) {
			$erroresFormulario[] = "No has introducido los conocimientos previos en ingles.";
		}

		$breveDescripcion = isset($datos['breveDescripcion']) ? $datos['breveDescripcion'] : null;
		$breveDescripcion = self::clean($breveDescripcion);
		if (empty($breveDescripcion)) {
			$erroresFormulario[] = "No has introducido la breve descripcion";
		}

		$breveDescripcionI = isset($datos['breveDescripcionI']) ? $datos['breveDescripcionI'] : null;
		$breveDescripcionI = self::clean($breveDescripcionI);
		if (empty($breveDescripcionI)) {
			$erroresFormulario[] = "No has introducido la breve descripcion en ingles";
		}

		$programaDetallado = isset($datos['programaDetallado']) ? $datos['programaDetallado'] : null;
		$programaDetallado = self::clean($programaDetallado);
		if (empty($programaDetallado)) {
			$erroresFormulario[] = "No has introducido el programa detallado";
		}

		$programaDetalladoI = isset($datos['programaDetalladoI']) ? $datos['programaDetalladoI'] : null;
		$programaDetalladoI = self::clean($programaDetalladoI);
		if (empty($programaDetalladoI)) {
			$erroresFormulario[] = "No has introducido el programa detallado en ingles";
		}


		if (count($erroresFormulario) === 0) {
			/*if(isset($datos['modificar'])){
				$conocimientoInformatico = ConocimientoInformatico::modifica($lenguaje,$nivel,$idCurriculum);
				if($conocimientoInformatico){
					$erroresFormulario = "conocimientosInformaticos.php?modificado=y";
				}else{
					$erroresFormulario[] = "No se ha podido modificar el conocimiento informatico.";
				}
			}elseif(isset($datos['registrar'])){
				$conocimientoInformatico = ConocimientoInformatico::crea($lenguaje,$nivel,$idCurriculum);
				if($conocimientoInformatico){
					$erroresFormulario = "conocimientosInformaticos.php?anadido=y";
				}else{
					$erroresFormulario[] = "No se ha podido crear el conocimiento informatico.";
				}
			}*/
		}
		return $erroresFormulario;
	}
}
