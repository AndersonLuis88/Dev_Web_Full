<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model {

private $id;
private $nome;
private $email;
private $senha;

public function __get($atributo){
	return $this->$atributo;
}

public function __set($atributo, $valor){
	$this->$atributo = $valor;
}

public function Save(){
	$query = "insert into users(nome,email,senha)values(:nome, :email, :senha)";
	$stmt = $this->db->prepare($query);

	$stmt->bindValue(':nome', $this->__get('nome'));
	$stmt->bindValue(':email', $this->__get('email'));
	$stmt->bindValue(':senha', $this->__get('senha'));
	$stmt->execute();

	return $this;
}

public function validarCadastro(){
	$valido = true;

	if(strlen($this->__get('nome')) < 3){
		$valido = false;
	}
	if(strlen($this->__get('email')) < 3){
		$valido = false;
	}
	if(strlen($this->__get('senha')) < 3){
		$valido = false;
	}


	return $valido;
}

public function getUserPorEmail(){
	$query = "select nome,email from users where email = :email";
	$stmt = $this->db->prepare($query);
	$stmt->bindValue(':email', $this->__get('email'));
	$stmt->execute();

	return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

public function autenticar(){
	 $query = "select id,nome,email from users where email = :email and senha = :senha";
	 $stmt = $this->db->prepare($query);
	 $stmt->bindValue(':email', $this->__get('email'));
	 $stmt->bindValue(':senha', $this->__get('senha'));
	 $stmt->execute();

	 $user = $stmt->fetch(\PDO::FETCH_ASSOC);

	 if($user['id'] != '' && $user['nome'] != ''){
	 	$this->__set('id', $user['id']);
	 	$this->__set('nome', $user['nome']);
	 }

	 return $this;
}

}

?>