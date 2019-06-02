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

		$routes[ 'autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'indexController',
			'action' => 'autenticar'
		);

		$routes['logoff'] = array(
			'route' => '/logoff',
			'controller' => 'indexController',
			'action' => 'logoff'
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

		$routes['interesses'] = array(
			'route' => '/interesses',
			'controller' => 'indexController',
			'action' => 'interesses'
		);
	


		$routes['cadastro_editar'] = array(
			'route' => '/cadastro_editar',
			'controller' => 'indexController',
			'action' => 'cadastro_editar'
		);

		$routes['editar_senha'] = array(
			'route' => '/editar_senha',
			'controller' => 'indexController',
			'action' => 'editar_senha'
		);

		$routes['idiomas'] = array(
			'route' => '/idiomas',
			'controller' => 'indexController',
			'action' => 'idiomas'
		);

		$this->setRoutes($routes);

	}

}

?>