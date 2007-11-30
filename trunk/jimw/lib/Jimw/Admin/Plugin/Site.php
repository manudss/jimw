<?php

/**
 *
 */
class Jimw_Admin_Plugin_Site extends Zend_Controller_Plugin_Abstract {
	public function preDispatch(Zend_Controller_Request_Abstract $request) {
		$session = new Zend_Session_Namespace('Admin');
		// If the param site is set, change the session site.
		$sites = new Jimw_Site_Site ();
		if (isset($request->site)) {
			$session->site = $sites->find($request->site);
		}
		if (!isset($session->site)) {
			$domains = new Jimw_Site_Domain();
			$domain = $domains->fetchRow(array ('path_name = ?' => $request->getDomainName(),
						'path_port = ?' => $request->getDomainPort(),
						'path_protocol = ?' => $request->getDomainProtocol(),
						'path_subdomain = ?' => $request->getSubDomain()));
			if (!$domain) {
				throw new Jimw_Exception("This ".$request->getPath()." url didn't exist");
			}
			$session->site = $domain->findParentJimw_Site_Site();
		}
	}
}

?>