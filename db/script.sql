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
                         nome_arquivo VARCHAR(50) unique,
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
    PRIMARY KEY (cod_playlist, cod_musica)
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

INSERT INTO musicas (nome_musica, ano_lancamento, album, banda, nome_arquivo) VALUES
    ('Let It Be', 1970, 'Let It Be', 'The Beatles', '17a9f6ee152788180e363a6c6cfc9439.jpg'),
    ("Sweet Child O' Mine", 1987, 'Appetite for Destruction', "Guns N' Roses", '0da912dcfa951096c5694d4283d6269c.jpg'),
    ('Yellow', 2021, "Parachutes", 'Coldplay', '4fd1973354d590cbc71cbe17536c6713.jpg'),
    ('For Those About to Rock (We Salute You)', 1981, NULL, 'AC/DC', '14da339ca0774a5cb3339a02fbe6fcea.jpg'),
    ('Hells Bells', 1980, 'Back in Black', 'AC/DC', '8e9079efa40156c81c9843125ff97501.jpg'),
    ('Come Together', 1969, 'Abbey Road', 'The Beatles', '688f8477c48a8e0c3122acc23f27dd6a.jpg'),
    ('Yellow Submarine', 1966, 'Revolver', 'The Beatles', 'f58cd0f0774d843be90ad0e3b1413e31.jpeg');