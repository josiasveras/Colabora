<?php
namespace App\Controllers\;

class ValidaCadastro {
  private $nome;
  private $email;
  private $senha;
  private $palavra;

  public function validaCampo(){
    if(!preg_match("/^[a-zA-Z0-9'-]+$/", $this->$palavra)){
      echo "Caracteres invalidos";
    } else {
      return $palavra;
    }
  }

  public function validaNome() {
    if (empty($this->$nome)){
    	echo "Nome não pode estar vazio";
    } elseif(preg_match("([0-9])", $this->$nome)){
      echo "Nome inválido";
    } elseif(!preg_match("/^[a-zA-Z'-]+$/", $this->$nome)){
      echo "Caracteres invalidos";
    } elseif((strlen($this->$nome) >= 40)){
      echo "Máximo 40 caracteres";
    } else {
      echo "Nome válido";
    }
  }

  public function validaEmail() {
      if(filter_var($this->$email, FILTER_VALIDATE_EMAIL) == false) {
        echo "E-mail inválido";
      } else {
        echo "E-mail válido";
      }
  }

  public function validaSenha() {
    if (empty($this->$senha)){
    	echo "A senha não pode estar vazia";
    } elseif(!preg_match("([0-9])", $this->$senha)){
      echo "A senha precisa ter números e letras";
    } elseif(!preg_match("/^[a-zA-Z0-9'-]+$/", $this->$senha)){
      echo "Caracteres invalidos";
    } elseif(((strlen($this->$senha) < 8) || (strlen($this->$senha) > 8))){
      echo "A senha precisa ter no máximo 8 caracteres";
    } else {
      echo "Senha válida";
    }
  }
}
