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

		$routes['cadastro'] = array(
			'route' => '/cadastro',
			'controller' => 'indexController',
			'action' => 'cadastro'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['projeto'] = array(
			'route' => '/projeto',
			'controller' => 'indexController',
			'action' => 'projeto'
		);

		$this->setRoutes($routes);

	}

}

?>