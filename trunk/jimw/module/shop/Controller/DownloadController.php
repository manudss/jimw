<?php
/**
 * DownloadController
 *
 * @author	   Logisim
 * @category   Jimw_Shop
 * @package    Jimw_Module
 * @copyright  Copyright (c) 2006-2008 jimw.fr
 * @license    http://www.jimw.fr
 * @version    $Id: $
 */

include_once('Model/ShopAlbum.php');
include_once('Model/ShopSong.php');
include_once('Model/ShopSongOrder.php');
class Shop_DownloadController extends Jimw_Module_Action
{
	public function listAction() {
		$ordermodel = new ShopSongOrder();
		$albummodel = new ShopAlbum();
		$songmodel = new ShopSong();
		$request = $this->getRequest();

		$id = (int)$request->id;
		if ($id > 0) {
			$orders = $ordermodel->find($id);
			if (count($orders) > 0) {
				$order = $orders->current();
				if ($order->key == $request->key) {
					if ($order->paid == '1') {
						$this->view->music = $songmodel->find(explode(',', $order->musiclist));
						$this->view->albummusic = $albummodel->find(explode(',', $order->albummusiclist));
						$this->view->score = $songmodel->find(explode(',', $order->scorelist));
						$this->view->albumscore = $albummodel->find(explode(',', $order->albumscorelist));
						$this->view->order = $order;
						$this->render('list');
					} else {
						$this->render('notpaid');
					}
				}
			}
		}
	}
	
	public function musicAction() {
		$ordermodel = new ShopSongOrder();
		$songmodel = new ShopSong();
		$request = $this->getRequest();
		
		$this->view->file = NULL;

		$id = (int)$request->id;
		$orderid = (int)$request->orderid;
		if ($id > 0 && $orderid > 0) {
			$orders = $ordermodel->find($orderid);
			$songs = $songmodel->find($id);
			if (count($orders) > 0 && count($songs) > 0) {
				$order = $orders->current();
				$song = $songs->current();
				if ($order->key == $request->key && $order->paid == '1') {
					if (in_array($id, explode(',',$order->musiclist))) {
						$this->_helper->layout->disableLayout();
						$this->view->file = $song->musicfile;
					}
				}
			}
		}
		$this->render('file');
	}

	public function scoreAction() {
		$ordermodel = new ShopSongOrder();
		$songmodel = new ShopSong();
		$request = $this->getRequest();
		
		$this->view->file = NULL;

		$id = (int)$request->id;
		$orderid = (int)$request->orderid;
		if ($id > 0 && $orderid > 0) {
			$orders = $ordermodel->find($orderid);
			$songs = $songmodel->find($id);
			if (count($orders) > 0 && count($songs) > 0) {
				$order = $orders->current();
				$song = $songs->current();
				if ($order->key == $request->key && $order->paid == '1') {
					if (in_array($id, explode(',',$order->scorelist))) {
						$this->_helper->layout->disableLayout();
						$this->view->file = $song->scorefile;
					}
				}
			}
		}
		$this->render('file');
	}

	public function albummusicAction() {
		$ordermodel = new ShopSongOrder();
		$albummodel = new ShopAlbum();
		$request = $this->getRequest();
		
		$this->view->file = NULL;

		$id = (int)$request->id;
		$orderid = (int)$request->orderid;
		if ($id > 0 && $orderid > 0) {
			$orders = $ordermodel->find($orderid);
			$albums = $albummodel->find($id);
			if (count($orders) > 0 && count($albums) > 0) {
				$order = $orders->current();
				$album = $albums->current();
				if ($order->key == $request->key && $order->paid == '1') {
					if (in_array($id, explode(',',$order->albummusiclist))) {
						$this->_helper->layout->disableLayout();
						$this->view->file = $album->musicfile;
					}
				}
			}
		}
		$this->render('file');
	}

	public function albumscoreAction() {
		$ordermodel = new ShopSongOrder();
		$albummodel = new ShopAlbum();
		$request = $this->getRequest();
		
		$this->view->file = NULL;

		$id = (int)$request->id;
		$orderid = (int)$request->orderid;
		if ($id > 0 && $orderid > 0) {
			$orders = $ordermodel->find($orderid);
			$albums = $albummodel->find($id);
			if (count($orders) > 0 && count($albums) > 0) {
				$order = $orders->current();
				$album = $albums->current();
				if ($order->key == $request->key && $order->paid == '1') {
					if (in_array($id, explode(',',$order->albumscorelist))) {
						$this->_helper->layout->disableLayout();
						$this->view->file = $album->scorefile;
					}
				}
			}
		}
		$this->render('file');
	}

}
?>