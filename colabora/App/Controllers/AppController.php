<?php 

    namespace App\Controllers;

    //Aqui ficaram as páginas que precisam de autenticação para serem acessadas
    use MF\Controller\Action;
    use MF\Model\Container;

    class AppController extends Action{

        public function home_projetos() {

                //session_start();

                $this->validaAutenticacao();

           // if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {

                //recuperação dos projetos
                $projeto = Container::getModel('Projeto');

                //Retornando apenas os projetos que o usuario cadastrou através do seu id na sessão
                //$projeto->__set('usuario_cadastro_basico_id', $_SESSION['id']);

                $projetos = $projeto->getAllProjetos();

                /*echo '<pre>';
                print_r($projetos);
                echo '</pre>';*/

                $this->view->projetos = $projetos;

                $this->render('home_projetos');

           /* }else {
                header('Location: /login?auth=erro');
            }*/

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

        /* public function fotos(){

            $this->render('fotos');

        } */

        public function quem_sou(){

            $this->render('quem_sou');

        }

        public function projeto(){

            //session_start();

            $this->validaAutenticacao();

            $this->render('projeto');

                //print_r ($_SESSION);

                /*if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
                    $this->render('projeto');
                }else {
                    header('Location: /login?auth=erro');
                }*/

        }

        public function salvarProjeto() {

            $this->validaAutenticacao();
            
            $this->render('projeto');
            echo 'Cheguei aqui';
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
                
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
            header('Location: /home_projetos');
            
        }

        public function habilidades() {

            $this->validaAutenticacao();

            $this->render('habilidades');
            
        }

        public function salvarHabilidade() {

            $this->validaAutenticacao();

            $this->render('habilidades');
            echo 'Cheguei aqui';
                
            $habilidades = Container::getModel('Habilidades');

            echo 'Cheguei aqui 2';

            //if $_POST['user_skills_esporte'] exemplo
            //if para inserir mais de uma hbilidade

            if (condition) {
                # code...
            }

            $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
            $habilidades->__set('habilidade_id', $_POST['habilidade_esporte']);
            $habilidades->__set('nivel', $_POST['user_skills_esporte']);

            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            $habilidades->insertHabilidade();
            $this->render('habilidades');
              
        }
        
        public function cadastro_editar() {

            $this->render('cadastro_editar');

        }

        public function interesses() {

            $this->render('interesses');
    
        }

        public function fotos()	{

            $this->render('fotos');
        }	

        public function editar_senha() {

            $this->render('editar_senha');
    
        }

        public function excluir_conta()
          {

        $this->render('excluir_conta');
             }

        public function validaAutenticacao() {

            session_start();

            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login?auth=erro');
            }
        
        }

    }
