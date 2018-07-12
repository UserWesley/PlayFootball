<?php

class InicioControle extends ControladorVisao {
    
    //Caso o usuário já esteja logado, ir pra tela de carregamento
    public function index() {
        
        if(empty($_SESSION['login'])){
            $this->loadTemplate('login');
        }
        else {
            $this->loadTemplate('carregamento');
        }
    }
    
    //Tela para cadastro de novo usuário
    public function cadastroUsuario(){
        $this->loadTemplate('cadastroUsuario');
    }
    
    //Função cadastrar usuário
    public function cadastrarUsuario(){
       
        $usuarioDAO = new UsuarioDAO();
        $controlador = new ControladorVisao();
        $usuario = new Usuario(array(
            'nome'=>$_GET['nome'],
            'sobrenome'=>$_GET['sobrenome'],
            'email'=>$_GET['email'],
            'login'=>$_GET['login'],
            'senha'=>$_GET['senha']
        ));
        
        
        if(($usuarioDAO->verificaEmail($usuario) == true )){
            echo "E-mail já existe";
        }
        
        else if(($usuarioDAO->verificaLogin($usuario) == true )){
            echo "Login já existe";
        }
        else if (($usuario->verificaSenha($_GET['senha'],$_GET['confirmaSenha']) == false)){
            echo "senha diferentes";
        }
        else {
            if($usuarioDAO->cadastrar($usuario)){
                echo "Cadastrado com Sucesso";
                
                
                $this->loadTemplate('login');
            }
            else {
                echo "Cadastro Sem sucesso";
                
                $this->loadTemplate('cadastroUsuario');
            }
        }
    }
    
    //Função para validar dados inseridos pelo usuário no login
    public function validaLogon(){
        
        $usuarioDAO = new UsuarioDAO();
        $controlador = new ControladorVisao();
        $usuario = new Usuario(array(
            'login'=>$_GET['login'],
            'senha'=>$_GET['senha']
        ));
        
        if($usuarioDAO->verificaLogon($usuario)){
            
            $campeonatoControle = new CampeonatoControle();
            $campeonatoControle->carregarJogosSalvos();
        }
        else{
            echo "senha errada";
        }
    }
    
    //Função para desativar sessão, e voltar a tela de login
    public function deslogar(){
        
        session_unset();
        
        $controlador = new ControladorVisao();
        $this->loadTemplate('login');
    }
}