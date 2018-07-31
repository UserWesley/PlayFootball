<?php

//Inicia sessão
session_start();

//carrega arquivo de conexão com o banco
require('config.php');

//Registra todas funções automaticamente, não será necessário os requires
spl_autoload_register(function($class){
    
    if(file_exists('_controle/'.$class.'.php')) {
        require '_controle/'.$class.'.php';
    }
    else if(file_exists('_modelo/'.$class.'.php')){
        require '_modelo/'.$class.'.php';
    }
    else if(file_exists('_nucleo/'.$class.'.php')){
        require '_nucleo/'.$class.'.php';
    }
    else if(file_exists('_dao/'.$class.'.php')){
        require '_dao/'.$class.'.php';
    }
});
//inicia o sistema
$nucleo = new Nucleo();
$nucleo->iniciar();