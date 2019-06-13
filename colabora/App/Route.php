<?php 

namespace App;

use MF\Init\Bootstrap;

//Requisitos funcionais da applicação
class Route extends Bootstrap {

	//Definição das rotas da nossa aplicação
	protected function initRoutes() {
		//arrays que administram as rotas de URL
		$routes['index'] = array(
			//"Home" que é o path raiz '/'
			'route' => '/index',
			//Que aciona o "indexController" 
			'controller' => 'indexController',
			//Que dispara a action "index" 
			'action' => 'index'
		);

		$routes['home'] = array(
			'route' => '/',
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
			'controller' => 'appController',
			'action' => 'projeto'
		);

		$routes['salvarProjeto'] = array(
			'route' => '/salvarProjeto',
			'controller' => 'appController',
			'action' => 'salvarProjeto'
		);

		$routes['interesses'] = array(
			'route' => '/interesses',
			'controller' => 'indexController',
			'action' => 'interesses'
		);

		$routes['cadastro_editar'] = array(
			'route' => '/cadastro_editar',
			'controller' => 'appController',
			'action' => 'cadastro_editar'
		);

		$routes['editar_senha'] = array(
			'route' => '/editar_senha',
			'controller' => 'appController',
			'action' => 'editar_senha'
		);

		$routes['idiomas'] = array(
			'route' => '/idiomas',
			'controller' => 'indexController',
			'action' => 'idiomas'
		);

		$routes['interesses'] = array(
			'route' => '/interesses',
			'controller' => 'appController',
			'action' => 'interesses'
		);

		$routes['habilidades'] = array(
			'route' => '/habilidades',
			'controller' => 'appController',
			'action' => 'habilidades'
		);

		$routes['salvarHabilidade'] = array(
			'route' => '/salvarHabilidade',
			'controller' => 'appController',
			'action' => 'salvarHabilidade'
		);

		$routes['salvarInteresse'] = array(
			'route' => '/salvarInteresse',
			'controller' => 'appController',
			'action' => 'salvarInteresse'
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

		$routes['fotos'] = array(
			'route' => '/fotos',
			'controller' => 'appController',
			'action' => 'fotos'
		);

		$routes['quem_sou'] = array(
			'route' => '/quem_sou',
			'controller' => 'appController',
			'action' => 'quem_sou'
		);
		$routes['excluir_conta'] = array(
			'route' => '/excluir_conta',
			'controller' => 'appController',
			'action' => 'excluir_conta'
		);

		$routes['index_projeto'] = array(
			'route' => '/index_projeto',
			'controller' => 'indexController',
			'action' => 'index_projeto'
		);


		$this->setRoutes($routes);

	}

}

?>