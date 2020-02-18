<?php

namespace es\ucm;

class FormBibliografia extends Form
{

	protected function generaCamposFormulario($datosIniciales)
	{
		$idBibliografia = isset($datosIniciales['idBibliografia']) ? $datosIniciales['idBibliografia'] : null;
		$citasBibliograficas = isset($datosIniciales['citasBibliograficas']) ? $datosIniciales['citasBibliograficas'] : null;
		$recursosInternet = isset($datosIniciales['recursosInternet']) ? $datosIniciales['recursosInternet'] : null;

		$html = '<div class="form-group">
		<label for="citasBibliograficas">Citas bibliograficas</label>
		<textarea class="form-control" id="citasBibliograficas" rows="3" name="citasBibliograficas" >' . $citasBibliograficas . '</textarea>
		</div>

		<div class="form-group">
		<label for="recursosInternet">Recursos internet</label>
		<textarea class="form-control" id="recursosInternet" rows="3" name="recursosInternet" >' . $recursosInternet . '</textarea>
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

		$citasBibliograficas = isset($datos['citasBibliograficas']) ? $datos['citasBibliograficas'] : null;
		$citasBibliograficas = self::clean($citasBibliograficas);
		if (empty($citasBibliograficas)) {
			$erroresFormulario[] = "No has introducido las citas bibliograficas.";
		}

		$recursosInternet = isset($datos['recursosInternet']) ? $datos['recursosInternet'] : null;
		$recursosInternet = self::clean($recursosInternet);
		if (empty($recursosInternet)) {
			$erroresFormulario[] = "No has introducido los recursos en internet.";
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
