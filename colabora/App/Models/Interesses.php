<?php 

namespace App\Models;

use MF\Model\Model;

class Interesses extends Model {

	private $id;
	private $usuario_cadastro_basico_id;
	private $interesse_id;

    public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
    }
    
    //Salvar
	public function insertInteresse() {
		try {
		$query = "insert into interesseXusuario_cadastro_basico(usuario_cadastro_basico_id,interesse_id)values(:usuario_cadastro_basico_id,:interesse_id)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':usuario_cadastro_basico_id', $this->__get('usuario_cadastro_basico_id'));
		$stmt->bindValue(':interesse_id', $this->__get('interesse_id'));
		$stmt->execute();

		return $this;
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}

	}

}
?>