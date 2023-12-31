CREATE DATABASE IF NOT EXISTS larpets;

USE larpets;

CREATE TABLE IF NOT EXISTS tutores (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(255) NOT NULL,
	endereco VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS petsitters (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) UNIQUE NOT NULL,
	senha VARCHAR(255) NOT NULL,
	telefone VARCHAR(255) NOT NULL,
	cpf VARCHAR(255) NOT NULL,
	rg VARCHAR(255) NOT NULL,
	endereco VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS pets (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_tutor INT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	especie VARCHAR(255) NOT NULL,
	raca VARCHAR(255) NOT NULL,
	genero VARCHAR(255) NOT NULL,
	data_nascimento DATE NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	url_foto VARCHAR(255) NOT NULL,
	FOREIGN KEY (id_tutor) REFERENCES tutores(id)
);

CREATE TABLE IF NOT EXISTS perfis_petsitter (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	url_foto VARCHAR(255) NOT NULL,
	biografia VARCHAR(255) NOT NULL,
	dias_disponiveis VARCHAR(255) NOT NULL,
	FOREIGN KEY (id) REFERENCES petsitters(id)
);

CREATE TABLE IF NOT EXISTS servicos_petsitter (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_petsitter INT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL,
	FOREIGN KEY (id_petsitter) REFERENCES petsitters(id)
);

CREATE TABLE IF NOT EXISTS servicos_solicitados (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_petsitter INT NOT NULL,
	id_tutor INT NOT NULL,
	id_servico INT NOT NULL,
	data_solicitacao DATETIME NOT NULL,
	status VARCHAR(255) NOT NULL,
	data_conclusao DATETIME,
	FOREIGN KEY (id_petsitter) REFERENCES petsitters(id),
	FOREIGN KEY (id_tutor) REFERENCES tutores(id),
	FOREIGN KEY (id_servico) REFERENCES servicos_petsitter(id)
);

CREATE TABLE IF NOT EXISTS avaliacoes (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_petsitter INT NOT NULL,
	id_tutor INT NOT NULL,
	nota int NOT NULL,
	data_avaliacao DATETIME NOT NULL,
	comentario VARCHAR(255) NOT NULL,
	FOREIGN KEY (id_petsitter) REFERENCES petsitters(id),
	FOREIGN KEY (id_tutor) REFERENCES tutores(id)
);

CREATE TABLE IF NOT EXISTS mensagens (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_petsitter INT NOT NULL,
	id_tutor INT NOT NULL,
	remetente VARCHAR(255) NOT NULL,
	data_envio DATETIME NOT NULL,
	tipo_mensagem VARCHAR(255) NOT NULL,
	mensagem VARCHAR(255) NOT NULL,
	FOREIGN KEY (id_petsitter) REFERENCES petsitters(id),
	FOREIGN KEY (id_tutor) REFERENCES tutores(id)
);

CREATE TABLE IF NOT EXISTS afiliados (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	url_foto VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS produtos_afiliados (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_afiliado INT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL,
	url_foto VARCHAR(255) NOT NULL,
	FOREIGN KEY (id_afiliado) REFERENCES afiliados(id)
);
