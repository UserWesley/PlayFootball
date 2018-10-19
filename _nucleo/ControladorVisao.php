<?php

//Classe responsável por carregar os templates e o front end
class ControladorVisao {

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require '_visao/'.$viewName.'.php';
	}
	
	//Carrega layout das páginas iniciais
	public function loadTemplate($viewName, $viewData = array()) {
		require '_visao/layout.php';
	}
	
	//Carrega layout do campeonato
	public function loadTemplateCampeonato($viewName, $viewData = array()) {
	    require '_visao/layoutCampeonato.php';
	}
	
	//Carrega layout da partida
	public function loadTemplatePartida($viewName, $viewData = array()) {
	    require '_visao/layoutPartida.php';
	}
	
	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require '_visao/'.$viewName.'.php';
	}

}