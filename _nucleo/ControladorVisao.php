<?php

//Classe responsável por carregar os templates e o front end
class ControladorVisao {

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require '_visao/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require '_visao/layout.php';
	}

	public function loadTemplateCampeonato($viewName, $viewData = array()) {
	    require '_visao/layoutCampeonato.php';
	}
	
	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require '_visao/'.$viewName.'.php';
	}

}