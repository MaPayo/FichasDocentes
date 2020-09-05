<?php
namespace es\ucm;
require_once('includes/Negocio/Generacion/SAGeneracion.php');
include('vendor/autoload.php');

class SAGeneracionImplements implements SAGeneracion{
    public static function generacionHTMLSpanish($datos){
        ob_clean();
		ob_start();

		require('includes/Presentacion/Vistas/html/cabecera.php');
		
		$content = ob_get_contents();
		ob_clean();
		file_put_contents($datos[1], $content);
		return is_file($datos[1]);

	}
	public static function generacionPDFSpanish($datos)
	{
		$dompdf= new \Dompdf\Dompdf();
		$content = file_get_contents($datos[2]);

		// instantiate and use the dompdf class
		$dompdf->loadHtml($content);

		$dompdf->setPaper('A4', 'portrait');
		//$dompdf->setPaper(array(0,0,821.86,756.00),'executive'); //x inicio, y inicio, ancho final, alto final
		//$dompdf->set_option('defaultFont', 'Courier');
		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		//$dompdf->stream($filename);
		$output = $dompdf->output();
		file_put_contents($datos[1], $output);
		return is_file($datos[1]);
	}
}