<?php

//Classe que representa a entidade jogador
class Jogador{
    
    private $id;
    private $nome;
    private $sobrenome;
    private $numero;
    private $idade;
    private $peso;
    private $altura;
    private $posicao;
    private $agilidade;
    private $chute;
    private $forca;
    private $lancamento;
    private $pegar;
    private $marcacao;
    private $resistencia;
    private $salto;
    private $tackle;
    private $velocidade;
    private $preco;
    private $salario;
    private $time;
    private $campeonato ;
    
    //Método construtor com todos atributos da classes jogador 
    public function __construct($array){
        $this->id = (isset($array['id']))?$array['id']:'';
        $this->nome = (isset($array['nome']))?$array['nome']:'';
        $this->sobrenome = (isset($array['sobrenome']))?$array['sobrenome']:'';
        $this->numero = (isset($array['numero']))?$array['numero']:'';
        $this->idade = (isset($array['idade']))?$array['idade']:'';
        $this->peso = (isset($array['peso']))?$array['peso']:'';
        $this->altura = (isset($array['altura']))?$array['altura']:'';
        $this->posicao = (isset($array['posicao']))?$array['posicao']:'';        
        $this->agilidade = (isset($array['agilidade']))?$array['agilidade']:'';
        $this->chute = (isset($array['chute']))?$array['chute']:'';
        $this->forca = (isset($array['forca']))?$array['forca']:'';
        $this->lancamento = (isset($array['lancamento']))?$array['lancamento']:'';
        $this->pegar = (isset($array['pegar']))?$array['pegar']:'';
        $this->marcacao = (isset($array['marcacao']))?$array['marcacao']:'';
        $this->resistencia = (isset($array['resistencia']))?$array['resistencia']:'';
        $this->salto = (isset($array['salto']))?$array['salto']:'';
        $this->tackle = (isset($array['tackle']))?$array['tackle']:'';
        $this->velocidade = (isset($array['velocidade']))?$array['velocidade']:'';
        $this->preco = (isset($array['preco']))?$array['preco']:'';
        $this->salario = (isset($array['salario']))?$array['salario']:'';
        $this->time = (isset($array['time']))?$array['time']:'';
        $this->campeonato = (isset($array['campeonato']))?$array['campeonato']:'';
    }
    
    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function getPosicao()
    {
        return $this->posicao;
    }

    public function getAgilidade()
    {
        return $this->agilidade;
    }

    public function getChute()
    {
        return $this->chute;
    }

    public function getForca()
    {
        return $this->forca;
    }

    public function getLancamento()
    {
        return $this->lancamento;
    }

    public function getPegar()
    {
        return $this->pegar;
    }

    public function getMarcacao()
    {
        return $this->marcacao;
    }

    public function getResistencia()
    {
        return $this->resistencia;
    }

    public function getSalto()
    {
        return $this->salto;
    }

    public function getTackle()
    {
        return $this->tackle;
    }

    public function getVelocidade()
    {
        return $this->velocidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getCampeonato()
    {
        return $this->campeonato;
    }

    //A função listaNome é composta por array com diversos nomes,
    //que tem a responsabilidade de retorna um, por meio de sorteio
    public function listaNome(){
        $nome = array("João","José","Caetano","Wesley","Jefferson","Jeferson","Cristaldo","Ubaldo",
            "Romario","Cafu","Pablo","Rivelino","Sandro","Marcio","Riquelme","Jeremias","Gomes","Silas",
            "Evandro","Leandro","Thobias","Tobias","Temer","Michel","Tadeu","Marcos","Marcus","Sandoval",
            "Celson","Anselmo","Juvenal","Pietro","Aristoteles","Platão","Sergio","Antonio","Samuel",
            "Justh","Wescley","Willian","Nivaldo","Ricardo","Paulo","Pedro","Eduardo","Virgilio","Lucas",
            "Luccas","Ari","Gervasio","Fernando","Flavio","Fabio","Claudio","Claudinei","Carlos","Manuel",
            "Manoel","Oliver","Medeiros","Roberto","Douglas","Alex","Frederico","Guilherme","Gustavo",
            "Lenilson","Denilson","Eder","Ederson","Bruno","Leo","Leonardo","Ronilson","Rener","Richard",
            "Davi","David","Doni","Dorivaldo","Ivan","Ivanildo","Robson","Denis","Dênis","Alberto",
            "Gilmar","Gilberto","Hilbert","Romualdo","Adriano","Adrian","Ademir","Adalberto","Allan",
            "Alan","Bryan","Rodrigo","Tony","Toni","Valdir","Valderez","Valmir","Walmir","Washington",
            "Vanderson","Wanderson","Felipe","Filipe","Filipi","Miguel","Luis","Luiz","Toledo","Henrique",
            "Helder","Icaro","Zé","Zetti","Zacarias");
        
        $chave = array_rand($nome,1);
        return $nome[$chave];
    }

    
    //A função listaSobrenome é composta por array com diversos sobrenomes,
    //que tem a responsabilidade de retorna um, por meio de sorteio
    public function listaSobrenome(){
        $sobrenome = array("de Almeida","da Silva ","da Pena","da Costa ","Pereira","Tosta ","Figueiredo",
            "Figueiredo da Silva","da Silva Figueiredo","Escobar","Escobar Neto","Escobar Filho","Escobar Junior
            ","Filho Escobar","Filho","Neto","Junior","da Costa Neto","Siqueira","Alves","Averedo","Averedo Neto",
            "Averedo Filho","Averedo Junior","Junior Averedo","Filho Averedo","Neto Averedo","Pedro","Coutinho",
            "Pinto","Guimarães Lima","Guimarães","Lima","Coelho","Coelho Filho","Pedro Coutinho","Alves Siqueira",
            "Siqueira Alves","Coutinho da Silva","da Silva Coutinho","Perez","da Silva Perez",
            "Fernandes da Silva","Fernandes","Manoel","Medeiros","da Silva Medeiros","Medeiros da Silva"
            ,"Sousa","Sousa da Silva","Sousa da Costa","Sousa Pereira","Pereira Souza","Oliveira",
            "Oliveira da Silva","Oliveira da Costa","Oliveira da Couto","Oliveira Teixeira",
            "Teixeira da Silva","Teixeira da Costa","Teixeira Gomes","Teixeira Mendes","Mendes Pitta",
            "Pitta","Alvarez","Alvarez Pitta","Alvarez Couto","Alveres Pereira","Pereira Alveres",
            "Cardoso","Cardoso Filho","Cardoso da Silva","Cardoso Neto","Teixeira Cardoso",
            "Alvares Cardoso Mendes","Mendes da Silva","Mendes da Costa","da Costa Mendes",
            "Silveira","Silveira da Silva","Silveira Neto","Silveira Couto","Gonçalves","Gonçalvez",
            "Gonçalves da Silva","Gonçalves Neto","Gonçalves Pereira");

        $chave = array_rand($sobrenome,1);
        return $sobrenome[$chave];
    }
    
    //Funções Referentes as características do jogador
    public function gerarIdade(){
        
        $idade = rand(17,39);
        return $idade;    
    }
    
    public function gerarPeso(){
        $peso = rand(80,150);
        return $peso;
    }
    
    public function gerarAltura(){
        $altura = rand(160,200);
        return $altura;
    }
    
    //Lista com todas posições do futebol americano 
    public function gerarPosicao(){
        $posicoes = array("QB"=>"Quarterback", "RB"=>"Running Back","WR"=>"Wide Receiver",
            "TE"=>" Tight End","C"=>"Center","OG"=>"Offensive Guards Left",
            "OG"=>"Offensive Guards Right","LT"=>"Tackle Left","RT"=>"Tackle Right"
        ,"DE"=>"Defensive End","DT"=>"Defensive Tackle","MLB"=>"Middle/Inside Linebackers",
            "OLB"=>"Outside Linebackers","CB"=>"Cornerback","S"=>"Safety","P"=>"Punter",
        "K"=>"Kicker");
        
        $chave = array_rand($posicoes,1);
        return $posicoes[$chave];
    }
    //Funções Referentes as habilidades dos jogadores
    //Gera e retorna um valor entre 1 e 99
    public function gerarAgilidade(){
        $agilidade = rand(1,99);
        return $agilidade;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarChute(){
        $chute = rand(1,99);
        return $chute;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarForca(){
        $forca = rand(1,99);
        return $forca;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarLancamento(){
        $lancamento = rand(1,99);
        return $lancamento;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarPegar(){
        $pegar = rand(1,99);
        return $pegar;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarMarcacao(){
        $marcacao = rand(1,99);
        return $marcacao;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarResistencia(){
        $resistencia = rand(1,99);
        return $resistencia;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarSalto(){
        $salto = rand(1,99);
        return $salto;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarTackle(){
        $tackle = rand(1,99);
        return $tackle;
    }
    //Gera e retorna um valor entre 1 e 99
    public function gerarVelocidade(){
        $velocidade = rand(1,99);
        return $velocidade;
    }
}