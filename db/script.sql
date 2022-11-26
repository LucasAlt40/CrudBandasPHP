create database if not exists musicfy;
use musicfy;

CREATE TABLE bandas (
                        nome VARCHAR(55) NOT NULL UNIQUE,
                        integrantes VARCHAR(255) NOT NULL,
                        PRIMARY KEY (nome)
);

CREATE TABLE musicas (
                         id_musica INT AUTO_INCREMENT,
                         nome_musica VARCHAR(55) NOT NULL,
                         ano_lancamento INT(4) NOT NULL,
                         album VARCHAR(55),
                         banda VARCHAR(55),
                         lancamento boolean default true,
                         PRIMARY KEY (id_musica),
                         FOREIGN KEY (banda) REFERENCES bandas(nome)
);

CREATE TABLE Usuario (
  nome VARCHAR(55) not null,
  sobrenome VARCHAR(55) not null,
  cpf VARCHAR(14),
  tipo_usuario tinyint default 1,
  email VARCHAR(60) UNIQUE NOT NULL,
  senha VARCHAR(40) NOT NULL,
  PRIMARY KEY (cpf)
);


CREATE TABLE playlist (
    id_playlist int AUTO_INCREMENT PRIMARY KEY,
    cpf_usuario VARCHAR(14) not null,
    FOREIGN key (cpf_usuario) REFERENCES Usuario(cpf)
);

CREATE TABLE playlist_musicas (
    cod_playlist int not null,
    cod_musica int not null,
    FOREIGN KEY (cod_musica) REFERENCES musicas(id_musica),
    FOREIGN KEY (cod_playlist) REFERENCES playlist(id_playlist),
    PRIMARY KEY (cod_playlist)
);


INSERT INTO 
  Usuario (nome, sobrenome, cpf, tipo_usuario, email, senha)
VALUES
  ("Lucas", "Theodoro", "11111111111", 2, "lucas@email.com", "23A6A3CF06CFD8B1A6CDA468E5756A6A6A1D21E7");


INSERT INTO bandas VALUES
                       ('AC/DC', 'Brian Johnson, Angus Young, Bon Scott, Malcolm Young, Phill Rudd'),
                       ("Guns N' Roses", 'Axl Rose, Slash, Izzy Stradlin, Duf McKagan, Steven Adler'),
                       ('The Beatles', 'John Lennon, Paul McCartney, Ringo Starr, George Harrison'),
                       ('Coldplay', 'Chris Martin, Jonny Buckland, Guy Berryman, Will Champion');

INSERT INTO musicas (nome_musica, ano_lancamento, album, banda) VALUES
                                                                    ('Let It Be', 1970, 'Let It Be', 'The Beatles'),
                                                                    ("Sweet Child O' Mine", 1987, 'Appetite for Destruction', "Guns N' Roses"),
                                                                    ('Yellow', 2021, "Parachutes", 'Coldplay'),
                                                                    ('For Those About to Rock (We Salute You)', 1981, NULL, 'AC/DC'),
                                                                    ('Hells Bells', 1980, 'Back in Black', 'AC/DC'),
                                                                    ('Come Together', 1969, 'Abbey Road', 'The Beatles'),
                                                                    ('Yellow Submarine', 1966, 'Revolver', 'The Beatles');