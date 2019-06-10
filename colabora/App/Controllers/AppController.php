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

        public function quem_sou(){

            $this->render('quem_sou');

        }

        public function projeto(){

            session_start();

            //print_r ($_SESSION);

                if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
                    $this->render('projeto');
                }else {
                    header('Location: /login?auth=erro');
                }

        }

        public function salvarProjeto() {

            session_start();
            
            $this->render('projeto');
            echo 'Cheguei aqui';
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
                
            $projeto = Container::getModel('Projeto');

            echo 'Cheguei aqui 2';

            /*$inputImagem = $_FILES['arquivo']['tmp_name'];
            $imagem = fopen($inputImagem, "rb");
            $img = fread($imagem, filesize($inputImagem));*/

            $projeto->__set('id_categoria', $_POST['categoria']);
            $projeto->__set('id_usuario', $_SESSION['id']);
            $projeto->__set('nome_projeto', $_POST['nome_projeto']);
            $projeto->__set('descricao', $_POST['Comment']);
            //$projeto->__set('foto_projeto', $img);

            $projeto->insertProjeto();
            $this->render('projeto');

            }else {
                header('Location: /login?auth=erro');
            }
            
        }

        public function habilidades() {

            $this->render('habilidades');
    
        }

        public function salvarHabilidade() {

            session_start();
            
            $this->render('habilidades');
            echo 'Cheguei aqui';

            if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
                
            $habilidades = Container::getModel('Habilidades');

            echo 'Cheguei aqui 2';

            $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
            $habilidades->__set('habilidade_id', $_POST['div_esporte']);
            $habilidades->__set('nivel', $_POST['user_skills']);

            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            return

            $habilidades->insertHabilidades();
            $this->render('habilidades');

            }else {
                header('Location: /login?auth=erro');
            }
            
        }
        
        public function cadastro_editar() {

            $this->render('cadastro_editar');

        }

    }
?>