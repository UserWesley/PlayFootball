<?php

//Classe responsável por controlar páginas não encontradas no site
class PaginaNaoEncontradaControle extends ControladorVisao {

	public function index() {
		$this->loadView('404', array());
	}

}