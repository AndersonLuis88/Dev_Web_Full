<?php

namespace App;

class Connection{

	public function getDb(){
		try{

			$conn = new \PDO(
				"mysql:host=localhost;dbname=mvc;charset=utf8",
				"root",
				"374360"
			);
			return $conn;

		} catch (\PDOException $e){

		}
	}


}


?>