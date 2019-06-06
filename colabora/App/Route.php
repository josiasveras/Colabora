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

		$routes['home'] = array(
			'route' => '/index',
			'controller' => 'indexController',
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
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['logoff'] = array(
			'route' => '/logoff',
			'controller' => 'AuthController',
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

		$routes['interesses'] = array(
			'route' => '/interesses',
			'controller' => 'indexController',
			'action' => 'interesses'
		);

		$routes['habilidades'] = array(
			'route' => '/habilidades',
			'controller' => 'indexController',
			'action' => 'habilidades'
		);

		$routes['politica_privacidade'] = array(
			'route' => '/politica_privacidade',
			'controller' => 'indexController',
			'action' => 'politica_privacidade'
		);

		$routes['home_projetos'] = array(
			'route' => '/home_projetos',
			'controller' => 'appController',
			'action' => 'home_projetos'
		);

		$routes['perfil'] = array(
			'route' => '/perfil',
			'controller' => 'appController',
			'action' => 'perfil'
		);

		$this->setRoutes($routes);

	}

}

?>