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
  private $foto_projeto;

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

   
    echo 'Cheguei aqui 3';
    try {
      $query = "insert into projeto 
                (categoria_id, usuario_cadastro_basico_id, nome_projeto, descricao) 
                values 
                (:id_categoria, :id_usuario, :nome_projeto, :descricao)";
      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':id_categoria', $this->__get('id_categoria'));
      $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
      $stmt->bindValue(':nome_projeto', $this->__get('nome_projeto'));
      $stmt->bindValue(':descricao', $this->__get('descricao'));
      //$stmt->bindValue(':foto_projeto', $this->__get('foto_projeto'));
      $stmt->execute();

      echo 'Cheguei aqui 4';

      return $this;
    } catch (Exception $e) {
      echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

  }

  //Recuperado projetos do banco
  public function getAllProjetos() {

    //Utilizando where para retornar apenas os projetos que o usuario cadastrou 
    $query = "
      select 
        p.id, p.usuario_cadastro_basico_id, p.categoria_id, pc.nome_categoria, p.nome_projeto, p.foto_projeto, p.descricao, DATE_FORMAT(p.data, '%d/%m/%y %H:%i') as data
      from 
        projeto as p
        left join projeto_categoria as pc on (p.categoria_id = pc.id)
      order by
        p.data desc
        ";

        /*sem filtrar por id 
        (where t.usuario_cadastro_basico_id = :usuario_cadastro_basico_id) erro aqui?*/

    $stmt = $this->db->prepare($query);

    //Retornando apenas os projetos que o usuario cadastrou 
    //$stmt->bindValue(':usuario_cadastro_basico_id', $this->__get('usuario_cadastro_basico_id'));

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);

}

  //edita projeto
 /* public function updateProjeto(){
    $query
  }

  public function pesquisaProjetos(){

  }*/
}

 ?>
