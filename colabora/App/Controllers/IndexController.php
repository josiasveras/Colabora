<?php 

namespace App\Controllers;

//Os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action{

	public function index() {

		$this->render('index');

	}

	public function cadastro() {

		$this->render('cadastro');

	}

	public function login() {

		$this->render('login');

	}

	public function registrar() {

		$usuario = Container::getModel('Usuario');

		//('atributo', $_POST('valor recebido via POST'));
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);
		$usuario->__set('dt_nasc', $_POST['bday']);
		$usuario->__set('genero', $_POST['user_gender']);
		$usuario->__set('estado', $_POST['user_nationality']);

		if ($usuario->validarCadastro() && count($usuario->getUsuarioPoremail()) == 0) {

			$usuario->salvar();
				
			echo "Cadastro realizado com sucesso!";

		}else{

			echo "Deu ruim...";

		}

	}
}	

?>