<?php
namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;//estabelece conexão com bd e a model
use App\Models\Projeto;
use App\Controllers\ValidaController;

class ProjetoController {


  public function CriarProjeto(){
    $projeto = Container::getModel('Projeto');

    $projetos = $projeto->insertProjeto();

    // Tratando a Imagem.
    $inputImagem = $_FILES['inputImagem']['tmp_name'];
    $imagem = fopen($inputImagem, "rb");
    $img = fread($imagem, filesize($inputImagem));


    $projetos->__set('nome_projeto', $_POST['nome_projeto']);
		$projetos->__set('descricao', $_POST['descricao']);
		$projetos->__set('atrativos', $_POST['atrativos']);
    $projetos->__set('foto_projeto', $img);

  }

  public function ListarProjetos() {

    $projeto = Container::getModel('Projeto');

    //Chama o método no modelo e coloca na variável
    $projetos = $projeto->getProjeto();

    if($projetos != null){
      //foreach ($projetos as $key => $value) {
      //  echo $value."</br>";
      //}
      return $projetos;
    }
  }

  public function editaProjeto(){
    $projeto = Container::getModel('Projeto');

    $projetos = $projeto->insertProjeto();

    // Tratando a Imagem.
    $inputImagem = $_FILES['inputImagem']['tmp_name'];
    $imagem = fopen($inputImagem, "rb");
    $img = fread($imagem, filesize($inputImagem));


    $projetos->__set('nome_projeto', $_POST['nome_projeto']);
		$projetos->__set('descricao', $_POST['descricao']);
		$projetos->__set('atrativos', $_POST['atrativos']);
    $projetos->__set('foto_projeto', $img);
  }

  public function Pesquisa(){
    $projeto = Container::getModel('Projeto');

    $projetos = $projeto->pesquisaProjetos();

    $projetos->__set('palavra', $_POST['palavra']);
  }

}
?>
