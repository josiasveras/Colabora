<?php 

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model {

	private $id;
	private $nome;
	private $email;
	private $senha;
	private $dt_nasc;
	private $genero;
	private $estado;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	//Salvar
	public function salvar() {

		try {
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

		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}

		//$this->view->cadastrar = isset($_GET['cadastrar']) ? $_GET['cadastrar'] : '';
		


	}

	//Validar se o cadastro pode ser feito
	public function validarCadastro() {
		$valido = true;

		//Aqui serão feitas as validações dos campos do cadastro de usuário
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

	//Recuperar usuario por email (evitar duplicidade de cadastro)
	public function login()
	{
		$query = "select id, nome, email, senha from usuario_cadastro_basico where email = :email and senha = :senha";
		$stmt = $this->db->prepare($query);
		$stmt-> bindValue(':email', $this->__get('email'));
		$stmt-> bindValue(':senha', $this->__get('senha'));
		$stmt->execute();

		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if ($usuario['id'] != '' && $usuario['nome'] != '') {
			$this->__set('id', $usuario['id']);
			$this->__set('nome', $usuario['nome']);
		}

		return $this;

		/*if(count( $resultado ) > 0){
			return $resultado;
		}

		return false;*/
	}

	public function getInfoUsuario() {

		$query = "select nome from usuario_cadastro_basico where id = :id_usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

	public function getInfoUsuarioHabilidade() {

		$query = "select nome from usuario_cadastro_basico where id = :id_usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

	public function getInfoUsuarioQuemSou() {

		$query = "select quem_sou from usuario_quem_sou where id = :id_usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}

	public function getInfoUsuarioExperienciaDeVida() {

		$query = "select educacao, experiencia_profissional from usuario_experiencia_de_vida where id = :id_usuarios";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id'));
		$stmt->execute();

		return $stmt->fetch(\PDO::FETCH_ASSOC);

	}


}



?>