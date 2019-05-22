<?php 

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

	private $nome;
	private $email;
	private $senha;
	// private $dt_nasc;
	private $genero;
	private $estado_id;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	//Salvar
	public function salvar() {
		$query = "insert into usuario_cadastro_basico(nome, email, senha, genero, estado_id)values(:nome, :email, :senha, :genero, :estado_id)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome', $this->__get('nome'));
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));//md5() -> hash 32 caracteres
		// $stmt->bindValue(':dt_nasc', $this->__get('dt_nasc'));
		$stmt->bindValue(':genero', $this->__get('genero'));
		$stmt->bindValue(':estado_id', $this->__get('estado_id'));
		$stmt->execute();

		return $this;
	}

	//Validar cadastro

	//Recuperar usuario por email (evitat duplicidade de cadastro)
}



?>