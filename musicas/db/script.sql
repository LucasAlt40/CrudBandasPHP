USE ifsp;

CREATE TABLE BANDAS (
    NOME VARCHAR(55) NOT NULL UNIQUE,
    INTEGRANTES VARCHAR(255) NOT NULL,
    PRIMARY KEY (NOME)
);

CREATE TABLE MUSICAS (
	ID INT AUTO_INCREMENT,
    NOME VARCHAR(55) NOT NULL,
    ANO INT(4) NOT NULL,
    ALBUM VARCHAR(55),
    BANDA VARCHAR(55),
    PRIMARY KEY (ID),
    FOREIGN KEY (BANDA) REFERENCES BANDAS(NOME)
);

INSERT INTO BANDAS VALUES 
	('AC/DC', 'Brian Johnson, Angus Young, Bon Scott, Malcolm Young, Phill Rudd'),
    ("Guns N' Roses", 'Axl Rose, Slash, Izzy Stradlin, Duf McKagan, Steven Adler'),
    ('The Beatles', 'John Lennon, Paul McCartney, Ringo Starr, George Harrison'),
    ('Måneskin', 'Damiano David, Victoria De Angelis, Ethan Torchio, Thomas Raggi');

INSERT INTO MUSICAS (NOME, ANO, ALBUM, BANDA) VALUES 
	('Let It Be', 1970, 'Let It Be', 'The Beatles'),
    ("Sweet Child O' Mine", 1987, 'Appetite for Destruction', "Guns N' Roses"),
    ('I Wanna Be Your Slave', 2021, "Teatro d'ira: Vol. I", 'Måneskin'),
    ('For Those About to Rock (We Salute You)', 1981, NULL, 'AC/DC'),
    ('Hells Bells', 1980, 'Back in Black', 'AC/DC'),
    ('Come Together', 1969, 'Abbey Road', 'The Beatles'),
    ('Yellow Submarine', 1966, 'Revolver', 'The Beatles');