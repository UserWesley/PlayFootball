<?php

require 'environment.php';

$config = array();

if(ENVIRONMENT == 'desenvolvimento'){
    define("BASE_URL", "http://localhost/_Trabalho/");
    $config['nomeBanco'] = 'BancoDadosTCC';
    $config['host'] = 'localhost';
    $config['usuario'] = 'postgres';
    $config['senha'] = 'postgresql';
    
}

else{
    define("BASE_URL", "http://localhost/_Trabalho/");
    $config['dbname'] = 'trabalho';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'postgres';
    $config['dbpass'] = 'postgresql';    
}

global $banco;
try{
    $banco = new PDO("pgsql:dbname=".$config['nomeBanco'].";host=".$config['host'],
        $config['usuario'],$config['senha']);
}catch(PDOException $e){
    echo "ERRO ".$e->getMessage();
    exit;
}