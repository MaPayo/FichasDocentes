<?php
namespace es\ucm;
require_once('../../vendor/autoload.php');


require_once('includes/Negocio/Configuracion/SAConversion.php');
require_once('includes/Negocio/Configuracion/Conversion.php');

require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAConversionImplements implements SAConversion{
	private $pandoc;

	public function __construct(){
        $dompdf = new \Dompdf\Dompdf();
	
		$this->pandoc = new \Pandoc\Pandoc();
    }
    
        public static function getGrado($conversion)
        {
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAOGrado=$factoriesDAO->createDAOGrado(); 
            $grado=$DAOGrado->findGrado($conversion->getIDAsignatura());
        
            $DAOMD = $factoriesDAO->createDAOConversion();
            $markdown = $DAOMD->conversionGrado($grado);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }
        
        public static function getAsignatura($conversion)
        {
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOAsignatura(); 
            $result=$DAO->findAsignatura($conversion->getIDAsignatura());
            
            $DAOMD = $factoriesDAO->createDAOConversion();
            $markdown = $DAOMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public static function getMateria($conversion)
        {
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOMateria(); 
            $result=$DAO->findMateriaByAsignatura($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public static function getModulo($conversion)
        {
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOModulo(); 
            $result=$DAO->findModulobyAsignatura($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public static function getTeorico($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOTeorico(); 
            $result=$DAO->findTeorico($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public static function getProblema($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOProblema(); 
            $result=$DAO->findProblema($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public static function getLaboratorio($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOLaboratorio(); 
            $result=$DAO->findLaboratorio($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;

        }

        public static function getCoordinador($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOProfesor(); 
            $result=$DAO->findCoordinador($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;

        }

        public static function getCompetencias($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOCompetenciaAsignatura(); 
            $result=$DAO->findCompetenciaAsignatura($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;


        }

        public static function getBibliografia($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOBibliografia(); 
            $result=$DAO->findBibliografia($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;

        }

        public static function getMetodologia($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOMetodologia(); 
            $result=$DAO->findMetodologia($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;

        }

        public static function getEvaluacion($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOEvaluacion(); 
            $result=$DAO->findEvaluacion($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public function getProfesores($conversion){
            $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
            $DAO=$factoriesDAO->createDAOProfesor(); 
            $result=$DAO->findProfesor($conversion->getIDAsignatura());
            
            $SAMD = $factoriesDAO->createSAMarkdown();
            $markdown = $SAMD->conversionGrado($result);
            if($conversion->getHTML()){
                return $this->convertMarkdownToHTML($markdown);
            }
            else 
                return $markdown;
        }

        public function getAll($conversion){
            $md = '';
            $md = $this->getGrado($conversion);
            $md += $this->getAsignatura($conversion);
            $md += $this->getMateria($conversion);
            $md += $this->getModulo($conversion);
            $md += $this->getTeorico($conversion);
            $md += $this->getProblema($conversion);
            $md += $this->getLaboratorio($conversion);
            $md += $this->getCoordinador($conversion);
            $md += $this->getCompetencias($conversion);
            $md += $this->getBibliografia($conversion);
            $md += $this->getMetodologia($conversion);
            $md += $this->getEvaluacion($conversion);            
            $md += $this->getProfesores($conversion);
            return $md;
        }

        public function convertMarkdownToHTML($markdown) {
            $html = '';
            if (!empty($markdown))
            {
                $html = $this->pandoc->convert($markdown, "markdown_github", "html");
            }
            return $html;
        }


}