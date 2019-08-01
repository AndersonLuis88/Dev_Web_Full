<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '' ;
		$this->render('index');
	}

	public function inscreverse() {
		$this->view->user = array(
				'nome'  => '',
				'email' => '',
				'senha' => '',
			);

		$this->view->erroCadastro = false;
		$this->render('inscreverse');
	}

	public function registrar(){
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';
		$user = Container::getModel('User');

		$user->__set('nome', $_POST['nome']);
		$user->__set('email', $_POST['email']);
		$user->__set('senha', $_POST['senha']);

		if($user->validarCadastro() && count($user->getUserPorEmail()) == 0 ){
			
				$user->save();

				$this->render('cadastro');
		} else {
				
			$this->view->user = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

			$this->render('inscreverse');

		}

	}

}


?>