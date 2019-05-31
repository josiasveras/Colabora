<?php 

namespace App;

class Connection {
	
	public static function getDb() {

		try{

			//Usamos a "\" em PDO, por ela ser uma classe padrão do PHP indicamos que ela está no diretório raiz do mesmo
			$conn = new \PDO ("mysql:host=localhost;dbname=colabora;charset=utf8", 
				"root",
				""
			);

			return $conn;

		} catch (\PDOException $e) {
			echo "Erro ao conectar com banco de dados";
			//.. Tratamento de erro
		}
	}
}

?>