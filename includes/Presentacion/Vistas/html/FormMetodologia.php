<?php

namespace es\ucm;

class FormMetodologia extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idMetodologia = isset($datosIniciales['idMetodologia']) ? $datosIniciales['idMetodologia'] : null;
		$metodologia = isset($datosIniciales['metodologia']) ? $datosIniciales['metodologia'] : null;
		$metodologiaI = isset($datosIniciales['metodologiaI']) ? $datosIniciales['metodologiaI'] : null;

		$html = '<div class="form-group">
		<label for="metodologia">Metodologia</label>
		<textarea class="form-control" id="metodologia" rows="3" name="metodologia" >' . $metodologia . '</textarea>
		</div>

		<div class="form-group">
		<label for="metodologiaI">Metodologia (Ingles)</label>
		<textarea class="form-control" id="metodologiaI" rows="3" name="metodologiaI" >' . $metodologiaI . '</textarea>
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

		$metodologia = isset($datos['metodologia']) ? $datos['metodologia'] : null;
		$metodologia = self::clean($metodologia);
		if (empty($metodologia)) {
			$erroresFormulario[] = "No has introducido la metodologia.";
		}

		$metodologiaI = isset($datos['metodologiaI']) ? $datos['metodologiaI'] : null;
		$metodologiaI = self::clean($metodologiaI);
		if (empty($metodologiaI)) {
			$erroresFormulario[] = "No has introducido la metodologia en ingles.";
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
