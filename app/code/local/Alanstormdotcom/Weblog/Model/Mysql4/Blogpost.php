<?php
class Alanstormdotcom_Weblog_Model_Mysql4_Blogpost extends Mage_Core_Model_Mysql4_Abstract{
    
	protected function _construct()
    {
        $this->_init('weblog/blogpost', 'blogpost_id');//el primer par�meto es usado para identificar el Model. 
        //El segundo par�metro es el campo en la BBDD que es una columna de identificaci�n �nica.
    }   
}