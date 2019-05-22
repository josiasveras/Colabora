<?php 

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

	private $nome;
	private $email;
	private $senha;
	private $dt_nasc;
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
		$query = "insert into usuario_cadastro_basico(nome, email, senha, dt_nasc, genero, estado)values(:nome, :email, :senha, :dt_nasc, :genero, :estado)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome', $this->__get('nome'));
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));//md5() -> hash 32 caracteres
		$stmt->bindValue(':dt_nasc', $this->__get('dt_nasc'));
		$stmt->bindValue(':genero', $this->__get('genero'));
		$stmt->bindValue(':estado', $this->__get('estado'));
		$stmt->execute();

		return $this;

	}

	//Validar se o cadastro pode ser feito
	public function validarCadastro() {
		$valido = true;

		//Aqui serão feitas as validações dos campos do cadstro de usuário
		if (strlen($this->__get('nome'))  < 3) {
			$valido = false;
		}

		return $valido;

	}

	//Recuperar usuario por email (evitar duplicidade de cadastro)
	public function getUsuarioPorEmail(){
		$query = "select nome, email from usuario_cadastro_basico where email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}



?>