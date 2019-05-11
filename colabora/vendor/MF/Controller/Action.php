<?php 

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __construct() {
		$this->view = new \stdClass();
	}

	protected function render($view, $layout) {

		$this->view->page = $view;

		//Todas as inclusões devem ser feitas a partir do diretório público da aplicação

		if (file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		}else{
			$this->content();
		}

	}

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
	}

}

?>