<?php
/**
 * DomainController.php
 *
 * @author	   Patou
 * @category   Jimw_Admin
 * @package    Jimw
 * @copyright  Copyright (c) 2006-2007 jimw.fr
 * @license    http://www.jimw.fr
 * @version    $Id: ModuleController.php 116 2007-11-22 16:28:30Z patou.de.saint.steban $
 */

class DomainController extends Jimw_Admin_Action
{
	/**
	 * The default action - show the home page
	 */
    public function indexAction() 
    {
        $this->_forward('list');
    }
    
    public function listAction()
    {
    	$domains = new Jimw_Site_Domain();
    	$this->view->domains_list = $domains->fetchAll();
    }
    
	public function editAction () {
		$id = $this->_request->getParam('id');
		$domains = new Jimw_Site_Domain();
		$result = $domains->find($id);
		if (!$result->exists()) {
			Jimw_Debug::dump($result);
			throw new Jimw_Admin_Exception("The Domain $id didn't exist");
		}
		$result = $result->current();
		$this->view->domain = $result;
		$this->view->form_type = 'save';
		$this->view->id = $id;
		$this->render('form');
	}
	
	public function addAction () {
		$req = $this->_request;
		$domains = new Jimw_Site_Domain();
		$domain = $domains->fetchNew();
		$domain->name = $req->getDomainName ();
		$domain->protocol = 'http';
		$domain->port = '80';
		$domain->subdomain = 'www';
		$domain->path = $req->getBaseUrl (); 
		$this->view->domain = $domain;
		$this->view->form_type = 'insert';
		$this->view->id = '';
		$this->render('form');
	}
	
	public function saveAction () {
		$req = $this->_request;
		$id = $req->id;
		$tree = new Jimw_Site_Domain();
		$save = $tree->find($id)->current();
		$save->id = $id;
		$save->name = $req->name;
		$save->subdomain = $req->subdomain;
		$save->protocol = $req->protocol;
		$save->path = $req->path;
		$save->port = $req->port;
		$save->save ();
		$this->_helper->getHelper('FlashMessenger')->addMessage ('Save successful ' . $save->__toString ());
		$this->_forward('index');
	}
	
	public function insertAction () {
		$req = $this->_request;
		$tree = new Jimw_Site_Domain();
		$save = $tree->fetchNew();
		$save->site_id = 1;
		$save->database_id = 1;
		$save->status = 0;
		$save->name = $req->name;
		$save->subdomain = $req->subdomain;
		$save->protocol = $req->protocol;
		$save->path = $req->path;
		$save->port = $req->port;
		$save->save ();
		$this->_helper->getHelper('FlashMessenger')->addMessage ('Save successful ' . $save->__toString ());
		$this->_forward('index');
	}
	
	public function deleteAction () {
		$id = $this->_request->id;
		$domains = new Jimw_Site_Domain();
		$domain = $domains->find($id);
		if (!$domain->exists()) {
			throw new Jimw_Admin_Exception("The domain $id didn't exist");
		}
		$domain = $domain->current();
		$url = $domain->__toString();
		$domain->delete ();
		$this->_helper->getHelper('FlashMessenger')->addMessage ('Delete successful '. $url);
		$this->_forward('list');
	}
}
		
