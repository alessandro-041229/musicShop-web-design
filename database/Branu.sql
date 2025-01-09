DROP DATABASE if EXISTS aquistobrani;
CREATE DATABASE aquistobrani;
USE aquistobrani;

CREATE TABLE Cliente(
     idCliente INT PRIMARY KEY AUTO_INCREMENT,
     username VARCHAR(255) NOT NULL,
     nome VARCHAR(255) NOT NULL,
     cognome VARCHAR(255) NOT NULL,
     data_nascita DATE NOT NULL,
     indirizzo VARCHAR(255),
     tipo VARCHAR(255),
     password VARCHAR(255),
     credito INT
);

CREATE TABLE Artista(
     idArtista INT PRIMARY KEY AUTO_INCREMENT,
     nomeAR VARCHAR(255) NOT NULL,
     cognomeAR VARCHAR(255) NOT NULL
     
);

CREATE TABLE Brano(
idBrano INT PRIMARY KEY AUTO_INCREMENT,
     titolo VARCHAR(255) NOT NULL,
     album VARCHAR(255) NOT NULL,
     genere VARCHAR(255) NOT NULL,
     casa_discografica VARCHAR(255) NOT NULL,
     prezzo INT  NOT NULL,
     periodo_inizio DATE,
     periodo_fine DATE,
     idArtista INT NOT NULL,
     FOREIGN KEY (idArtista) REFERENCES Artista(idArtista)
     
);


CREATE TABLE Brano_Cliente(
   idBrano INT NOT NULL,
   idCliente INT NOT NULL,
   FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
   FOREIGN KEY (idBrano) REFERENCES Brano(idBrano)
);





INSERT INTO Cliente(username,nome,cognome,data_nascita,indirizzo,tipo,password,credito)
 VALUES
('TEE01','esposito','mauro','1981-07-11','via 1','user','abcd.1234',1000),
('TEE02','mauro','rossi','1981-07-11','via 1','user','abcd.1234',1000),
('TEE03','maurizio','roncucci','1981-07-11','via 1','amministratore','abcd.1234',1000),
('TEE04','luca','tozzi','1981-07-11','via 1','user','abcd.1234',1000);

INSERT INTO Artista(nomeAR,cognomeAR)
 VALUES
('esposita','cognome1'),
('maura','cognome2'),
('maurio','cognome3'),
('lucas','cognome4')
;

INSERT INTO Brano(titolo,album,genere,casa_discografica,prezzo,periodo_inizio,periodo_fine,idArtista)
 VALUES
('nights','the nights','romantic','casa1',1450,NULL,NULL,1),
('days','black rain','rock','casa2',1600,NULL,NULL,2),
('pio','dark sky','random','casa3',1900,'2023-6-11' ,'2023-11-11' ,3),
('cnijdjn','sun','punk','casa4',2000,NULL,NULL,4);


INSERT INTO Brano_Cliente(idBrano,idCliente)
 VALUES
(4,1),
(1,2),
(1,3),
(4,4);

