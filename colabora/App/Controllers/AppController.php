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

        public function experiencias()
         {
             $this->render('experiencias');
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
                
            $habilidades = Container::getModel('Habilidades');

            //if para inserir mais de uma habilidade
            if ($_POST['user_skills_esporte'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_esporte']);
                $habilidades->__set('nivel', $_POST['user_skills_esporte']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_comunicacao'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_comunicacao']);
                $habilidades->__set('nivel', $_POST['user_skills_comunicacao']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_cozinha'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_cozinha']);
                $habilidades->__set('nivel', $_POST['user_skills_cozinha']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_ensinar'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_ensinar']);
                $habilidades->__set('nivel', $_POST['user_skills_ensinar']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_devweb'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_web']);
                $habilidades->__set('nivel', $_POST['user_skills_devweb']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_reformas'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_reformas']);
                $habilidades->__set('nivel', $_POST['user_skills_reformas']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_decoracao'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_decoracao']);
                $habilidades->__set('nivel', $_POST['user_skills_decoracao']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_comunitario'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_comunitario']);
                $habilidades->__set('nivel', $_POST['user_skills_comunitario']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_outros'] != '') {
                $habilidades->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $habilidades->__set('habilidade_id', $_POST['habilidade_outros']);
                $habilidades->__set('nivel', $_POST['user_skills_outros']);

                $habilidades->insertHabilidade();
                //$this->render('habilidades');
            }

            if ($_POST['user_skills_esporte'] == '' && $_POST['user_skills_comunicacao'] == '' && $_POST['user_skills_cozinha'] == '' &&
            $_POST['user_skills_ensinar'] == '' && $_POST['user_skills_devweb'] == '' && $_POST['user_skills_reformas'] == '' &&
            $_POST['user_skills_decoracao'] == '' && $_POST['user_skills_comunitario'] == '' && $_POST['user_skills_outros'] == ''){

                echo '<div align="center" class="alert alert-danger" role="alert">
                Selecione ao menos uma categoria
                </div>';

            }
              
        }
        
        public function salvarInteresse() {

            $this->validaAutenticacao();

            $this->render('interesses');
                
            $interesses = Container::getModel('Interesses');

            //if para inserir mais de uma habilidade
            if (isset($_POST['habilidade_cidadania'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_cidadania']);

                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_educacao'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_educacao']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_esporte'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_esporte']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_saude'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_saude']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_cultura'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_cultura']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_acaosocial'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_acaosocial']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_idiomas'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_idiomas']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

            if (isset($_POST['habilidade_outros'])) {
                $interesses->__set('usuario_cadastro_basico_id', $_SESSION['id']);
                $interesses->__set('interesse_id', $_POST['habilidade_outros']);
            
                $interesses->insertInteresse();
                //$this->render('habilidades');
            }

                echo '<pre>';
                print_r($_POST);
                echo '<pre>';

            /*if ($_POST['habilidade_cidadania'] == '' && $_POST['habilidade_educacao'] == '' && $_POST['habilidade_esporte'] == '' &&
            $_POST['habilidade_saude'] == '' && $_POST['habilidade_cultura'] == '' && $_POST['habilidade_acaosocial'] == '' &&
            $_POST['habilidade_idiomas'] == '' && $_POST['habilidade_outros'] == ''){

                echo '<div align="center" class="alert alert-danger" role="alert">
                Selecione ao menos um interesse
                </div>';

            }*/
              
        }

        public function cadastro_editar() {

            $this->render('cadastro_editar');

        }

        public function interesses() {

            $this->validaAutenticacao();

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
