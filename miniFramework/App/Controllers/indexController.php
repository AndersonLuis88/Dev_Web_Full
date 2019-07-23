<?php

namespace App\Controllers;

use MF\Controller\Action;

class IndexController extends Action {
	

	public function index() {
		$this->view->dados = array('Code 1','Code 2','Code 3');
		$this->render('index', 'layout');
	}

	public function sobreNos() {
		$this->view->dados = array('Code 4','Code 5','Code 6');
		$this->render('sobreNos', 'layout');
	}

	
}


?>