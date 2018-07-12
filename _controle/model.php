<?php

class model {

	protected $banco;

	public function __construct() {
		global $banco;
		$this->banco = $banco;
	}

}