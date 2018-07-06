<?php
class PaginaNaoEncontradaControle extends ControladorVisao {

	public function index() {
		$this->loadView('404', array());
	}

}