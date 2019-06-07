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

		$this->view->auth = isset($_GET['auth']) ? $_GET['auth'] : '';
		$this->render('login');

	}

	/* public function autenticar()
	{
		$usuario = Container::getModel('Usuario');
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$getUsuario = $usuario->login();
		if( $getUsuario){
			
			$this->render('login');
			foreach( $getUsuario as $usuario){
				$_SESSION["id"] = $usuario['id'];
				$_SESSION["nome"] = $usuario['nome'];
				$_SESSION["email"] = $usuario['email'];
			}
		}else{
			$this->render('login');
			echo "Usuário inválido";
		}
	}
 */
	
	public function registrar() {

		$usuario = Container::getModel('Usuario');

		//('atributo', $_POST('valor recebido via POST'));
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', md5($_POST['senha']));//Convertendo a senha em hash md5
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

	public function editar_senha() {

		$this->render('editar_senha');

	}

	public function idiomas() {

		$this->render('idiomas');

	}

	public function interesses() {

		$this->render('interesses');

	}

	public function habilidades() {

		$this->render('habilidades');

	}

	public function politica_privacidade() {

		$this->render('politica_privacidade');

	}

	public function projeto() {

		session_start();
		
		$this->render('projeto');
		echo 'Cheguei aqui';
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			
		

		

		

		$projeto = Container::getModel('Projeto');

		echo 'Cheguei aqui 2';

		//$projeto = '1';

		/*$inputImagem = $_FILES['inputImagem']['tmp_name'];
    	$imagem = fopen($inputImagem, "rb");
		$img = fread($imagem, filesize($inputImagem));*/
		
		/*$projeto->__set('id_categoria', 1);
		$projeto->__set('id_usuario', $_SESSION['id']);
		$projeto->__set('nome_projeto', '2');
		$projeto->__set('descricao', '3');
		//$projetos->__set('foto_projeto', $img);*/

		$projeto->__set('id_categoria', $_POST['categoria']);
		$projeto->__set('id_usuario', $_SESSION['id']);
		$projeto->__set('nome_projeto', $_POST['nome_projeto']);
		$projeto->__set('descricao', $_POST['Comment']);
		//$projetos->__set('foto_projeto', $img);

		$projeto->insertProjeto();
		$this->render('projeto');

		}else {
			header('Location: /login?auth=erro');
		}

		
	}

	public function fotos()	{

		$this->render('fotos');
	}
	

}	

?>