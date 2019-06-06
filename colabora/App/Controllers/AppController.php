<?php 

    namespace App\Controllers;

    //Aqui ficaram as páginas que precisam de autenticação para serem acessadas
    use MF\Controller\Action;
    use MF\Model\Container;

    class AppController extends Action{

        public function home_projetos() {

            session_start();

            if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
                $this->render('home_projetos');
            }else {
                header('Location: /login?auth=erro');
            }

            /*$classAtual = get_class($this);
            echo($classAtual);
            session_start();
    
            
    
            echo('<pre>');
            print_r($_SESSION);
            echo('</pre>');*/
    
        }

        public function perfil() {

            $this->render('perfil');
    
        }

    public function fotos(){

        $this->render('fotos');
    }

    public function quem_sou()
    {

        $this->render('quem_sou');
    }


    }
?>