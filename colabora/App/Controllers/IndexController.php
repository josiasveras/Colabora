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

		$this->render('cadastro');

	}

	public function login() {

		$this->render('login');

	}

}	

?>