CREATE DATABASE ricette;
USE ricette;

CREATE TABLE ingredienti(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255),
	descrizione TEXT
);

CREATE TABLE paesi(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255)
);

CREATE TABLE cotture(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255)
);

CREATE TABLE portate(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255)
);

CREATE TABLE categorie(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255)
);


CREATE TABLE ricette(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	titolo VARCHAR(255) NOT NULL,
	tempo_preparazione INT,
	porzioni INT,
	testo TEXT,
	livello INT
);

CREATE TABLE immagini(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	id_ricetta INT REFERENCES ricette(id),
	percorso VARCHAR(255)
);


CREATE TABLE ricette_ingredienti (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_ricetta INT,
    id_ingrediente INT,
    FOREIGN KEY (id_ricetta) REFERENCES ricette(id),
    FOREIGN KEY (id_ingrediente) REFERENCES ingredienti(id)
);

CREATE TABLE ricette_paesi (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_ricetta INT,
    id_paese INT,
    FOREIGN KEY (id_ricetta) REFERENCES ricette(id),
    FOREIGN KEY (id_paese) REFERENCES paesi(id)
);

CREATE TABLE ricette_cotture (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_ricetta INT,
    id_cottura INT,
    FOREIGN KEY (id_ricetta) REFERENCES ricette(id),
    FOREIGN KEY (id_cottura) REFERENCES cotture(id)
);

CREATE TABLE ricette_portate (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_ricetta INT,
    id_portata INT,
    FOREIGN KEY (id_ricetta) REFERENCES ricette(id),
    FOREIGN KEY (id_portata) REFERENCES portate(id)
);

CREATE TABLE ricette_categorie (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_ricetta INT,
    id_categoria INT,
    FOREIGN KEY (id_ricetta) REFERENCES ricette(id),
    FOREIGN KEY (id_categoria) REFERENCES categorie(id)
);

