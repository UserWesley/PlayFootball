<?php

//Classe responsável pela incialização do sistema a partir da url 
class Nucleo{
    
    //Função principal da classe, responsável por extrair partes de url e separar funções e parametros
    public function iniciar(){
        
        $url = '/';
        
        if(isset($_GET['url'])) {
            $url .= $_GET['url'];
        }
        
        $params = array();
        
        //Controle
        if(!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);
            
            $currentController = $url[0];
            array_shift($url);
            
            //Ação
            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            
            //Parametros
            if(count($url) > 0) {
                $params = $url;
            }
            
        } else {
            $currentController = 'InicioControle';
            $currentAction = 'index';
        }
        
        //Se url não existir, será encaminhado para página não encontrada
        if(!file_exists('_controle/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
            $currentController = 'PaginaNaoEncontradaControle';
            $currentAction = 'index';
        }
        
        $c = new $currentController();
        
        call_user_func_array(array($c, $currentAction), $params); 
    }   
}