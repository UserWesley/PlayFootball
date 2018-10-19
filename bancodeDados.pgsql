DROP TABLE IF EXISTS Campeonato CASCADE;
DROP TABLE IF EXISTS Usuario CASCADE;
DROP TABLE IF EXISTS Time CASCADE;
DROP TABLE IF EXISTS Jogador CASCADE;
DROP TABLE IF EXISTS Comissao CASCADE;
DROP TABLE IF EXISTS Estadio CASCADE;
DROP TABLE IF EXISTS Jogo CASCADE;
DROP TABLE IF EXISTS DadosJogador CASCADE;

CREATE TABLE Usuario(
	id SERIAL,
	nome varchar(20),
	sobrenome varchar(50),
	email varchar(20) unique,	
	login varchar(20) unique,		
	senha varchar(150),

	PRIMARY KEY (id)
);

CREATE TABLE Campeonato(
	id SERIAL,
	nome varchar(20) unique,
	ano int,
	usuario int,
	fase varchar(10),

	FOREIGN KEY (Usuario) REFERENCES Usuario (id),
	PRIMARY KEY (id)
);

CREATE TABLE Time(
	id SERIAL,
	nome VARCHAR(20),
	torcida int,	
	vitoria int,
	ponto int,
	derrota int,
	empate int,
	dinheiro money,
	pontosFeitos int,
	pontosSofridos int,	
	grupo varchar(20),
	patrocinio money,	
	usuario int,
	campeonato int,

	FOREIGN KEY (Usuario) REFERENCES Usuario (id),
	FOREIGN KEY (Campeonato) REFERENCES Campeonato (id),	

	PRIMARY KEY (id)
);


CREATE TABLE comissao(
	id SERIAL,
	nome varchar(20),
	sobrenome varchar(50),
	funcao varchar(20),
	qualidade int,
	valor money,
	salario money,
	time int,
	campeonato int,	
	
	FOREIGN KEY (time) REFERENCES time (id),	
	FOREIGN KEY (campeonato) REFERENCES Campeonato (id),	
	PRIMARY KEY (id)
);

CREATE TABLE Jogador(

	id SERIAL,
	nome VARCHAR(20),
	sobrenome VARCHAR(50),
	numero int,
	idade int,
	peso int,
	altura int,
	posicao VARCHAR(50),
	agilidade int,
	chute int,	
	forca int,
	lancamento int,
	pegar int,
	marcacao int,
	resistencia int,
	salto int,
	tackle int,
	velocidade int,	
	preco money,
	salario money,
	time int,
	campeonato int,

	
	FOREIGN KEY (campeonato) REFERENCES Campeonato (id),
	FOREIGN KEY (time) REFERENCES Time (id),	
	PRIMARY KEY (id)
);

create table estadio(

	id SERIAL,
	nome varchar(20),
	capacidade int,
	ingresso money,
	despesas money,
	campeonato int,	

	FOREIGN KEY (Campeonato) REFERENCES Campeonato (id),	
	PRIMARY KEY (id)
);

create table dadosJogador(

	id SERIAL,
	quantidadeLancamento int,
	quantidadeLancamentoPerdido int,
	quantidadejardasAvancadas int,
	quantidadeCatch int,
	quantidadeCatchPerdido int,
	quantidadePonto int,
	quantidadeTackle int,
	quantidadetacklePerdido int,
	quantidadePunt int,
	quantidadePuntPerdido int,
	quantidadeFieldGoal int,
	quantidadeFieldGoalPerdido int,
	quantidadeExtraPoint int,
	quantidadeExtraPointPerdido int,
	quantidadeConversao int,
	quantidadeInterceptacao int,
	quantidadeInterferencia int,
	quantidadeFumble int,
	quantidadeFumblePerdido int,
	quantidadeSafety int,
	quantidadeTouchdown int,
	quantidadeJogos int,
	
	campeonato int,	

	FOREIGN KEY (Campeonato) REFERENCES Campeonato (id),
	PRIMARY KEY (id)
);


create table jogo(

	id serial,
	timeCasa int,
	pontosFeitoTimeCasa int,
	pontosTomadosTimeCasa int,	
	timeVisitante int,
	pontosFeitoTimeVisitante int,
	pontosTomadosTimeVisitante int,
	data timestamp,
	dadosJogo text,
	campeonato int,
	rodada int,
	tipo varchar(20),	
	publico int,

	FOREIGN KEY (timeCasa) REFERENCES Time (id),
	FOREIGN KEY (timeVisitante) REFERENCES Time (id),
	FOREIGN KEY (Campeonato) REFERENCES Campeonato (id),
	PRIMARY KEY (id)

);
