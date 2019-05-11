<?php 

namespace App;

use MF\Init\Bootstrap;

//Requisitos funcionais da applicação
class Route extends Bootstrap {

	//Definição das rotas da nossa aplicação
	protected function initRoutes() {
		//arrays que administram as rotas de URL
		$routes['home'] = array(
			//"Home" que é o path raiz '/'
			'route' => '/',
			//Que aciona o "indexController" 
			'controller' => 'indexController',
			//Que dispara a action "index" 
			'action' => 'index'
		);

		$this->setRoutes($routes);

	}

}

?>