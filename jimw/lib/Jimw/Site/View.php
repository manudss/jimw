<?php
/**
 * Jimw_Site_View
 *
 * @author	   Patou
 * @category   Jimw_Core
 * @package    Jimw
 * @copyright  Copyright (c) 2006-2007 jimw.fr
 * @license    http://www.jimw.fr
 * @version    $Id$
 */

class Jimw_Site_View extends Zend_View 
{
	
	/** @var $_translate Zend_Translate */
	protected $_translate = null;
	
	protected $_content = '';
	
	public function getContent () {
	    Jimw_Debug::deprecated('Jimw_Site_View->getContent()', '$this->layout()->content');
		//return $this->_content;
		return $this->layout()->content;
	}
	
	public function setContent ($content) {
	    Jimw_Debug::deprecated('Jimw_Site_View->setContent()', '$this->layout()->content');
		//$this->_content = $content;
		$this->layout()->content = $content;
	}
	
	public function appendContent ($content) {
	    Jimw_Debug::deprecated('Jimw_Site_View->appendContent()', '$this->layout()->content');
		//$this->_content .= $content;
		$this->layout()->content .= $content;
	}
	
	/**
	 * Translate function helper
	 *
	 * @param string $messageId
	 * @param string $local
	 * @return string
	 */
	public function _($messageId, $local = null)
	{
		if ($this->_translate)
			return $this->_translate->translate ($messageId, $local);
		return $messageId;
	}
	
	/**
	 * Set the translate object
	 *
	 * @param Zend_Translate $translate
	 */
	public function setTranslate (Zend_Translate $translate)
 	{
		$this->_translate = $translate;
	}
	
	/**
	 * Get the translate object
	 *
	 * @return Zend_Translate
	 */
	public function getTranslate ()
	{
		return $this->_translate;
	}
}