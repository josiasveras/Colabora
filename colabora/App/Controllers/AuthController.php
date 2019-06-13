<?php 

namespace App\Controllers;

//Os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{

    public function autenticar(){

        $usuario = Container::getModel('Usuario');

		$usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));//Convertendo a senha em hash md5
        
        $getUsuario = $usuario->login();

        if ($usuario->__get('id') != ''  && $usuario->__get('nome') != '' ) {
            
            session_start();

            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['nome'] = $usuario->__get('nome');

            header('Location: /interesses');

        }else{
            header('Location: /login?auth=erro');
        }
        
        /*if( $getUsuario){
		
			$this->render('login');
			foreach( $getUsuario as $usuario){
				$_SESSION["id"] = $usuario['id'];
				$_SESSION["nome"] = $usuario['nome'];
				$_SESSION["email"] = $usuario['email'];
			}
		}else{
			$this->render('login');
			echo "Tá loco cachoera?";
        }*/
    }
    
    public function logoff()
	{
        session_start();
		session_destroy();
		header('Location: /index');
	}


}

?>