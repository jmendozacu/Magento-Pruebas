<?php
/**
 * @author @davidselo
 * @description  
*/
class Nofrills_Booklayout_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		
		//var_dump ( __CLASS__ );// Pantalla: Nofrills_Booklayout_IndexController::indexAction
		/*Tenemos una serie de variables de parte de PHP que nos muestran par�metros adicionales:
		 * __METHOD__ ==> el m�todo que se est� ejecutando
		 * __FILE__ ====> el archivo que est� ejecutando
		 * ...
		 * Disponemos de una serie e variables m�gicas en PHP que podremos llamar para obtener informaci�n
		 * acerca del fichero que se esta ejecutando. Aqu� podemos ver todas las existentes
		 * http://php.net/manual/es/language.constants.predefined.php
		 * */
		
		$block=new Mage_Core_Block_Text();//instanciamos un Bloque del tipo Text
		$block->setText('Hello Patata');
		echo $block->toHtml();
	}
	public function blocktemplateAction(){
		/* @daviselo: para  ver como funciona los bloques con plantillas, posterior ejemplo realizaremos con a�aieno
		 * el bloque con estructura de padres e hijos
		$block= new Mage_Core_Block_Template();
		$block->setTemplate('nofrills/helloworld.phtml');
		*/
		$main_block= new Mage_Core_Block_Template();
		$main_block->setTemplate('nofrills/helloworld.phtml');
		//var_dump($block->getTemplateFile());//Con esta instrucci�n averiguamos donde esta buscando Magento el template
		$paragraph_block = new Mage_Core_Block_Text ();
		$paragraph_block -> setText ('One paragraph to rule them all.');
		$main_block->setChild('the_first', $paragraph_block);
		echo $main_block->toHtml();
	}
	public function manejandobloquesAction ()
	
	{
		$block_1 = new Mage_Core_Block_Text ();
		$block_1->setText ('Original Text');
		$block_2 = new Mage_Core_Block_Text();
		$block_2-> setText('The second sentence.');
		$main_block = new Mage_Core_Block_Template();
		$main_block->setTemplate ('nofrills/manejandobloques.phtml');
		$main_block->setChild ('the_first' ,$block_1 );
		$main_block->setChild ('the_second' ,$block_2 );
		$block_1->setText ('Wait , I want this text instead .');
		echo $main_block->toHtml();
	}
	public function helloblockAction()
	{
		//var_dump(__FILE__);
// 		$block_1 = new Mage_Core_Block_Text();
// 		$block_1 ->setText('The first sentence.');
// 		$block_2 = new Mage_Core_Block_Text();
// 		$block_2 ->setText('The second sentence.');
		$main_block = new Nofrills_Booklayout_Block_Helloworld();
		//$main_block->setTemplate ('nofrills/helloworld.phtml');
		//$main_block->setChild('the_first',$block_1);
		//$main_block->setChild('the_second',$block_2);
		echo $main_block->toHtml();
	}
	public function layoutAction ()
	{
		/*
		$layout = Mage::getSingleton('core/layout');
		//var_dump($layout);exit;
		$block = $layout->createBlock ('core/template','root');
		$block->setTemplate('nofrills/helloworld-2.phtml');
		echo $block->toHtml();*/
		
// 		$layout = Mage::getSingleton('core/layout');
// 		$block = $layout->createBlock('nofrills_booklayout/helloworld','root');
		/*con el siguiente m�todo decimos que este es el bloque con el que deber� comenzar
		 *  el proceso de renderizado de la p�gina*/
// 		$layout->addOutputBlock('root');
		/*con el siguiente m�todo decimos si queremos que el layout realice un echo por defecto o no*/
// 		$layout->setDirectOutput(false);
		
		/*Este es el m�todo que comienza el proceso renderizado de la p�gina*/
// 		$output=$layout->getOutput();//podemos capturar la salida generada por este m�todo
		//echo $output;
		/*Vamos a realizar todo lo que hemos hecho anteriormente pero usando una propiedad de PHP para
		 * poder concatenar llamdas a m�todos.*/
		$layout = Mage::getSingleton('core/layout');
		$block = $layout->createBlock('nofrills_booklayout/helloworld','root');
		echo $layout->addOutputBlock('root')->setDirectOutput(false)->getOutput();
		
	} 
	
}