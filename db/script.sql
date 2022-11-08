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

CREATE PROCEDURE prc_list_all_bandas()
BEGIN
    SELECT * FROM bandas;
end;

CREATE PROCEDURE prc_insert_banda(in n varchar(55), in i varchar(255))
BEGIN
    INSERT INTO bandas(nome, integrantes) values (n, i);
end;


CREATE PROCEDURE prc_deletar_musicas_por_banda(in n varchar(55))
BEGIN
    DELETE FROM musicas WHERE banda = n;
end;

CREATE PROCEDURE prc_deletar_banda(in n varchar(55))
BEGIN
    CALL prc_deletar_musicas_por_banda(n);
    DELETE FROM bandas WHERE nome=n;
end;


CREATE PROCEDURE prc_list_musica(in id int)
BEGIN
    SELECT * FROM musicas WHERE id_musica = id;
end;

CREATE PROCEDURE prc_list_all_musica()
BEGIN
    SELECT * FROM musicas;
end;

CREATE PROCEDURE prc_add_musica(
    in n varchar(55), in a int(4), in alb varchar(55), in ban varchar(55), in lanc int
)
BEGIN
    INSERT INTO musicas (nome_musica, ano_lancamento, album, banda, lancamento) VALUES (n, a, alb, ban, lanc);
end;

CREATE PROCEDURE prc_update_musica(
    in n varchar(55), in a int(4), in alb varchar(55), in ban varchar(55), in lanc int, in id int
)
BEGIN
    UPDATE musicas SET nome_musica=n, ano_lancamento=a, album=alb, banda=ban, lancamento=lanc WHERE id_musica = id;
end;

CREATE PROCEDURE prc_deletar_musica(in id int)
BEGIN
    DELETE FROM musicas WHERE id_musica=id;
end;


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