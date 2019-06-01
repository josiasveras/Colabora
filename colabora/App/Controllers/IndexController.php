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

		$this->view->usuario = array (
				'nome' => '',
				'email' => '',
				'senha' => '',
				'dt_nasc' => '',
				//'genero' => '',
				//'estado' => '',
			); 

		$this->view->erroCadastro = false;
		$this->render('cadastro');

	}

	public function login() {

		$this->render('login');

	}

	public function autenticar()
	{
		$usuario = Container::getModel('Usuario');
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$getUsuario = $usuario->login();
		if( $getUsuario){
			/**/
			$this->render('login');
			foreach( $getUsuario as $usuario){
				$_SESSION["id"] = $usuario['id'];
				$_SESSION["nome"] = $usuario['nome'];
				$_SESSION["email"] = $usuario['email'];
			}
		}else{
			$this->render('login');
			echo "Tá loco cachoera?";
		}
	}

	public function logoff()
	{
		session_destroy();
		header("Location: /");
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
			
			$this->render('login');
			echo "Cadastro realizado com sucesso!";

		}else{

			//Recuperando os dados preenchidos pelo usuário
			$this->view->usuario = array (
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
				'dt_nasc' => $_POST['bday'],
				//'genero' => $_POST['user_gender'],
				//'estado' => $_POST['user_nationality'],
			); 

			$this->view->erroCadastro = true;
			
			$this->render('cadastro');

		}

	}

	public function cadastro_editar() {

		$this->render('cadastro_editar');

	}

}	

?>