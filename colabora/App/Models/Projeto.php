<?php
namespace App\Models;
use MF\Model\Model;
/**
 *
 */
class Projeto extends Model {
  private $id;
  private $id_categoria;
  private $id_usuario;
  private $nome_projeto;
  private $descricao;
  //private $atrativos;
  //private $qtdVoluntarios;
  //private $foto_projeto;
  //private $palavra;

  public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

  //pesquisa projetos
  /*public function getProjeto(){
    $query = "select
              A.nome_categoria, B.nome, C.id, C.nome_projeto, C.descricao, C.atrativos, C.qtd_voluntario, C.foto_projeto
              from
              categoria as A, usuario_cadastro_basico as B, projeto as C
              where
              A.categoria_id = C.categoria_id and B.nome = C.nome"
    $stmt = $this->db->prepare($query);
    return $stmt->fetchAll();
  }*/

  //cria projeto
  public function insertProjeto(){
    //CÓDIGO ANNA
   /* $query = "insert into projeto
              (categoria_id, usuario_cadastro_basico_id, nome_projeto, descricao, atrativos, foto_projeto)
              values
              (:id_categoria, :id_usuario, :nome_projeto, :descricao, :atrativos, :foto_projeto)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_categoria', $this->__get('id_categoria'));
    $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
    $stmt->bindValue(':nome_projeto', $this->__get('nome_projeto'));
    $stmt->bindValue(':descricao', $this->__get('descricao'));
    $stmt->bindValue(':atrativos', $this->__get('atrativos'));
    $stmt->bindValue(':foto_projeto', $this->__get('foto_projeto'));
    $stmt->execute();*/

    echo 'Cheguei aqui';

    $query = "insert into projeto
              (categoria_id, usuario_cadastro_basico_id, nome_projeto, descricao)
              values
              (:id_categoria, :id_usuario, :nome_projeto, :descricao)";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id_categoria', $this->__get('id_categoria'));
    $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
    $stmt->bindValue(':nome_projeto', $this->__get('nome_projeto'));
    $stmt->bindValue(':descricao', $this->__get('descricao'));
    //$stmt->bindValue(':atrativos', $this->__get('atrativos'));
    //$stmt->bindValue(':foto_projeto', $this->__get('foto_projeto'));
    $stmt->execute();

    return $this;
  }

  //edita projeto
 /* public function updateProjeto(){
    $query
  }

  public function pesquisaProjetos(){

  }*/
}

 ?>
