DROP TABLE Telechargement;
DROP TABLE Video;
DROP TABLE Distribution;
DROP TABLE Film;
DROP TABLE Acteur;
DROP TABLE Serie;
DROP TABLE Format ;
DROP TABLE Categorie;
DROP TABLE Utilisateur;



CREATE TABLE Utilisateur(
	login VARCHAR(12), CONSTRAINT pk_utilisateur PRIMARY KEY(login), 
    adresse_mail VARCHAR(50) NOT NULL UNIQUE,
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL,
	mot2passe VARCHAR(50) NOT NULL,
	date_inscription DATE DEFAULT now(),
	actif BOOLEAN DEFAULT TRUE
);


CREATE TABLE Categorie(
	label VARCHAR(16), CONSTRAINT pk_categorie PRIMARY KEY(label),
	description VARCHAR(250)
);


CREATE TABLE Serie(
	id_s CHAR(6), CONSTRAINT pk_serie PRIMARY KEY(id_s),
	nom VARCHAR(50) NOT NULL
);


CREATE TABLE Acteur(
	id_a CHAR(8), CONSTRAINT pk_acteur PRIMARY KEY(id_a),
	nom VARCHAR(30) NOT NULL,
	prenom VARCHAR(30) NOT NULL
);



CREATE TABLE Format(
	libelle VARCHAR(5), CONSTRAINT pk_format PRIMARY KEY(libelle)
);


CREATE TABLE Film(
	id_f CHAR(8), CONSTRAINT pk_film PRIMARY KEY(id_f),
	titre VARCHAR(50) NOT NULL,
	date_sortie DATE,
	duree INTEGER CHECK (duree > 0),
	resume VARCHAR(500),
	num_ep INTEGER,
	visible BOOLEAN DEFAULT TRUE, 
	categorie VARCHAR(16), CONSTRAINT fk_film_categorie FOREIGN KEY (categorie) REFERENCES Categorie(label),
	serie CHAR(6), CONSTRAINT fk_film_serie FOREIGN KEY (serie) REFERENCES Serie(id_s) ON DELETE CASCADE
);


CREATE TABLE Video(
	url VARCHAR(200),
	qualite INTEGER,
	film VARCHAR(15), CONSTRAINT fk_video_film FOREIGN KEY (film) REFERENCES Film(id_f) ON DELETE CASCADE,
	format VARCHAR(5), CONSTRAINT fk_video_format FOREIGN KEY (format) REFERENCES Format(libelle),
	CONSTRAINT pk_video PRIMARY KEY(url, film)
);





CREATE TABLE Distribution(
	film VARCHAR(15), CONSTRAINT fk_distrib_film FOREIGN KEY (film) REFERENCES Film(id_f),
	acteur VARCHAR(10), CONSTRAINT fk_distrib_acteur FOREIGN KEY (acteur) REFERENCES Acteur(id_a),
	role VARCHAR(30),
	CONSTRAINT pk_distrib PRIMARY KEY(film, acteur)
);




CREATE TABLE Telechargement(
	utilisateur VARCHAR(30), CONSTRAINT fk_telech_util FOREIGN KEY (utilisateur) REFERENCES Utilisateur(login),
	video VARCHAR(30), film VARCHAR(15), CONSTRAINT fk_telech_video FOREIGN KEY (video,film) REFERENCES Video(url,film),
	date_telech DATE DEFAULT now(),
	CONSTRAINT pk_telech PRIMARY KEY(utilisateur, video, film, date_telech)
);


