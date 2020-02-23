<?php

namespace es\ucm;

class FormCompetenciaAsignatura extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idCompetencia = isset($datosIniciales['idCompetencia']) ? $datosIniciales['idCompetencia'] : null;
		$generales = isset($datosIniciales['generales']) ? $datosIniciales['generales'] : null;
		$generalesI = isset($datosIniciales['generalesI']) ? $datosIniciales['generalesI'] : null;
		$especificas = isset($datosIniciales['especificas']) ? $datosIniciales['especificas'] : null;
		$especificasI = isset($datosIniciales['especificasI']) ? $datosIniciales['especificasI'] : null;
		$basicasYTransversales = isset($datosIniciales['basicasYTransversales']) ? $datosIniciales['basicasYTransversales'] : null;
		$basicasYTransversalesI = isset($datosIniciales['basicasYTransversalesI']) ? $datosIniciales['basicasYTransversalesI'] : null;
		$resultadosAprendizaje = isset($datosIniciales['resultadosAprendizaje']) ? $datosIniciales['resultadosAprendizaje'] : null;
		$resultadosAprendizajeI = isset($datosIniciales['resultadosAprendizajeI']) ? $datosIniciales['resultadosAprendizajeI'] : null;

		$html = '<div class="form-group">
		<label for="generales">Generales</label>
		<textarea class="form-control" id="generales" rows="3" name="generales" >' . $generales . '</textarea>
		</div>

		<div class="form-group">
		<label for="generalesI">Generales (Ingles)</label>
		<textarea class="form-control" id="generalesI" rows="3" name="generalesI" >' . $generalesI . '</textarea>
		</div>

		<div class="form-group">
		<label for="especificas">Especificas</label>
		<textarea class="form-control" id="especificas" rows="3" name="especificas" >' . $especificas . '</textarea>
		</div>

		<div class="form-group">
		<label for="especificasI">Especificas (Ingles)</label>
		<textarea class="form-control" id="especificasI" rows="3" name="especificasI" >' . $especificasI . '</textarea>
		</div>

		<div class="form-group">
		<label for="basicasYTransversales">Basicas Y Transversales</label>
		<textarea class="form-control" id="basicasYTransversales" rows="3" name="basicasYTransversales" >' . $basicasYTransversales . '</textarea>
		</div>

		<div class="form-group">
		<label for="basicasYTransversalesI">Basicas Y Transversales (Ingles)</label>
		<textarea class="form-control" id="basicasYTransversalesI" rows="3" name="basicasYTransversalesI" >' . $basicasYTransversalesI . '</textarea>
		</div>

		<div class="form-group">
		<label for="resultadosAprendizaje">Resultados Aprendizaje</label>
		<textarea class="form-control" id="resultadosAprendizaje" rows="3" name="resultadosAprendizaje" >' . $resultadosAprendizaje . '</textarea>
		</div>

		<div class="form-group">
		<label for="resultadosAprendizajeI">Resultados Aprendizaje (Ingles)</label>
		<textarea class="form-control" id="resultadosAprendizajeI" rows="3" name="resultadosAprendizajeI" >' . $resultadosAprendizajeI . '</textarea>
		</div>

		<div class="text-right">
		<button type="button" class="btn btn-secondary" id="btn-form" data-dismiss="modal">Cancelar</button>'
		;

		if (isset($datosIniciales['modificar']) && $datosIniciales['modificar'] === "y") {
			$html .= '<button type="submit" class="btn btn-success" id="btn-form name="modificar">Modificar</button>';
		} else {
			$html .= '<button type="submit" class="btn btn-success" id="btn-form name="registrar">Registrar</button>';
		}
		$html .= '</div>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{

		$erroresFormulario = array();

		$generales = isset($datos['generales']) ? $datos['generales'] : null;
		$generales = self::clean($generales);
		if (empty($generales)) {
			$erroresFormulario[] = "No has introducido las competencias generales.";
		}

		$generalesI = isset($datos['generalesI']) ? $datos['generalesI'] : null;
		$generalesI = self::clean($generalesI);
		if (empty($generalesI)) {
			$erroresFormulario[] = "No has introducido las competencias generales en ingles.";
		}

		$especificas = isset($datos['especificas']) ? $datos['especificas'] : null;
		$especificas = self::clean($especificas);
		if (empty($especificas)) {
			$erroresFormulario[] = "No has introducido las competencias especificas";
		}

		$especificasI = isset($datos['especificasI']) ? $datos['especificasI'] : null;
		$especificasI = self::clean($especificasI);
		if (empty($especificasI)) {
			$erroresFormulario[] = "No has introducido las competencias especificas en ingles";
		}

		$basicasYTransversales = isset($datos['basicasYTransversales']) ? $datos['basicasYTransversales'] : null;
		$basicasYTransversales = self::clean($basicasYTransversales);
		if (empty($basicasYTransversales)) {
			$erroresFormulario[] = "No has introducido las competencias basicas y transversales";
		}

		$basicasYTransversalesI = isset($datos['basicasYTransversalesI']) ? $datos['basicasYTransversalesI'] : null;
		$basicasYTransversalesI = self::clean($basicasYTransversalesI);
		if (empty($basicasYTransversalesI)) {
			$erroresFormulario[] = "No has introducido las competencias basicas y trasnversales en ingles";
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
