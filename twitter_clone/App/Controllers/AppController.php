<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {


public function timeline(){

	session_start();

	if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
		$this->render('timeline');
	} else {
		header('Location: /?login=erro');
	}
	/* Trecho para teste de dados recebidos.
	echo '<pre>';
	print_r($_SESSION);
	echo'</pre>';
	*/
}

}

?>