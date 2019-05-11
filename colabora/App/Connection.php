<?php 

namespace App;

class Connection {
	
	public static function getDb() {

		try{

			//Usamos a "\" em PDO, por ela ser uma classe padrão do PHP indicamos que ela está no diretório raiz do mesmo
			$conn = new \PDO ("mysql:host=localhost;dbname=mvc;charset=utf8", 
				"root",
				""
			);

			return $conn;

		} catch (\PDOException $e) {
			//.. Tratamento de erro
		}
	}
}

?>