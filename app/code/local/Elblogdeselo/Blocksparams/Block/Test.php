<?php
/**
 * 
 * Enter description here ...
 * @author davidselo
 * @twitter @davidselo
 * @category design
 * @desc podemos ver en este ejemplo que si heredamos de Mage_core_Block_Abstract tendr�amos 
 * un bloque en el que su salida al ponerlo en cms mediante {{block type="blocksparams/test" name="bloque_con_parametros" nombre="david" apellidos="villalba flores"}}
 * o con <block ...> en el layout ser�a lo que imprime el m�todo _toHtml, ademas de que en este m�todo podemos capturar cualquier par�metro que le pasamos 
 * en la creaci�n del bloque, en este caso le hemos pasado nombre y apellido y los recogemos con $this->getNombre() y con $this->getApellidos().Aunque le pongamos en la 
 * creaci�n del bloque que contiene una plantilla no nos la va a mostrar por que no es un bloque destinado para ello, sin embargo si
 * extendemos de Mage_Core_Block_template autom�ticamente el template que le pongamos en el par�metro de creaci�n ser� su salida html.
 *{{block type="blocksparams/test" name="bloque_con_parametros" nombre="david" apellidos="villalba flores" template="blocksparams/test.phtml"}}
 *tomar� el template="blocksparams/test.phtml" como salida html.
 *Nota: el bloque Mage_core_Block_Template si creamos m�todo _toHtml() prevalecer� sobre el template y mostrar� ese html,esto es 
 *debido a que dicha clase extiende de Mage_Core_Block_template y tiene ese m�todo heredado.
 *
 */
class Elblogdeselo_Blocksparams_Block_Test extends Mage_Core_Block_Abstract{
//class Elblogdeselo_Blocksparams_Block_Test extends Mage_Core_Block_Template{
	
	
	protected function _toHtml(){
		
		$nombre=$this->getNombre();
		$apellidos=$this->getApellidos();
		$html=$nombre." ".$apellidos;
		return $html;
	}
}