<?php
/**
 * ManageController.php
 *
 * @author	   Logisim
 * @category   Jimw_Admin
 * @package    Jimw_Module
 * @copyright  Copyright (c) 2006-2008 jimw.fr
 * @license    http://www.jimw.fr
 * @version    $Id: ManageController.php 193 2008-04-07 20:13:26Z logisim $
 */
//include_once (dirname(__FILE__) . '/../../Controller/Model/Mejdoc.php');
class Shop_ManageController extends Jimw_Admin_Action
{
	public function editAction () {
		/*$id = $this->_request->id;
		$this->view->request = $this->_request;
		$blog = new Blog();
		$result = $news->findByTree($this->view->id);
		if (!$result) {
			$new = $blog->fetchNew();
			$new->content = '';
			$new->tree_id = $id;
			$new->date = '1900-01-01 00:00:00';
			$new->status = 0;
			$new->revisioninfo = '';
			$new->save();
			$result = $new;
		}
		$this->view->content = $result->content;
		$this->view->id = $id;*/
		$this->_forward('list', 'album');
	}

	public function deleteAction () {
		/*$documents = new Mejdoc();
		$list = $documents->fetchAll(array('tree_id = ?' => $this->getRequest()->id));
		foreach ($list as $documents) {
			$document->delete();
		}*/
	  	$this->_forward('list', 'tree', 'default');
	}
}
?>