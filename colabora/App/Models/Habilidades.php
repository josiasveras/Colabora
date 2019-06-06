<?php 

namespace App\Models;

use MF\Model\Model;

class Habilidades extends Model {

	private $id;
	private $habilidade;

    public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
    }
    
    //Salvar
	public function salvarHabilidade() {
		try {
		$query = "insert into habilidade(habilidade)values(:habilidade)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':habilidade', $this->__get('habilidade'));
		$stmt->execute();

		return $this;
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}

	}

}
?>