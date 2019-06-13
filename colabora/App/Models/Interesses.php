<?php 

namespace App\Models;

use MF\Model\Model;

class Habilidades extends Model {

	private $id;
	private $usuario_cadastro_basico_id;
	private $interesse;
	private $nivel;

    public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
    }
    
    //Salvar
	public function insertHabilidade() {
		try {
		$query = "insert into habilidadeXusuario_cadastro_basico(usuario_cadastro_basico_id,habilidade_id,nivel)values(:usuario_cadastro_basico_id,:habilidade_id,:nivel)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':usuario_cadastro_basico_id', $this->__get('usuario_cadastro_basico_id'));
		$stmt->bindValue(':habilidade_id', $this->__get('habilidade_id'));
		$stmt->bindValue(':nivel', $this->__get('nivel'));
		$stmt->execute();

		return $this;
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}

	}

}
?>