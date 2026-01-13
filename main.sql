CREATE DATABASE mabagnol ;

USE mabagnol ;


CREATE TABLE client (
	id INT  AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR (150) NOT NULL,
    email VARCHAR (150) NOT NULL,
    password_C VARCHAR (150) NOT NULL,
    role ENUM('client','admin') DEFAULT 'client',
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);



INSERT INTO vehicule (categorie_id, modele, prix, disponibilite, description_v, image) 
        VALUES (2, "BMW", 123, 1, "HHH", "NJJJN");

CREATE TABLE categorie (
    id_c INT AUTO_INCREMENT PRIMARY KEY ,
    name_c VARCHAR (150) NOT NULL ,
    description TEXT 
);

CREATE TABLE vehicule (
	id_v INT AUTO_INCREMENT PRIMARY KEY,
    categorie_id INT NOT NULL ,
    modele VARCHAR(150) NOT NULL ,
    prix float NOT NULL ,
    disponibilite BOOLEAN DEFAULT TRUE, 
    description_v TEXT ,
    created_v TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    FOREIGN KEY (catecorie_id) REFERENCES categorie(id_c)
);

USE mabagnol;

CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    lieu_prise VARCHAR(150),
    statut ENUM('confirmée', 'annulée') DEFAULT 'confirmée',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (vehicule_id)REFERENCES vehicule(id_v)
);

CREATE TABLE avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    vehicule_id INT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    deleted_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES client(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id_v)
);

CREATE TABLE themes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    actif BOOLEAN DEFAULT TRUE
);

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_theme INT NOT NULL,
    titre VARCHAR(150) NOT NULL,
    contenu TEXT NOT NULL,
    tags VARCHAR(255),
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('brouillon', 'publie') DEFAULT 'brouillon',
    FOREIGN KEY (id_client) REFERENCES client(id),
    FOREIGN KEY (id_theme) REFERENCES themes(id)
);

CREATE TABLE commentaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_article INT NOT NULL,
    contenu TEXT NOT NULL,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    soft_deleted BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_client) REFERENCES client(id),
    FOREIGN KEY (id_article) REFERENCES articles(id)
);


INSERT INTO client(name ,email ,password_C ,role)
VALUES ('khalid','khalidben@gmail.com','khalid','admin');

INSERT INTO categorie (name_c, description) VALUES
('SUV', 'Véhicules spacieux pour famille et voyage'),
('Sedan', 'Berlines confortables et élégantes'),
('Hatchback', 'Voitures compactes et maniables'),
('Moto', 'Motos pour tous les goûts et niveaux');

INSERT INTO vehicule (catecorie_id, modele, prix, disponibilite, description_v) VALUES
(1, 'Range Rover Sport', 85, TRUE, 'SUV de luxe avec toutes options.'),
(1, 'Toyota RAV4', 60, TRUE, 'SUV fiable et économique.'),
(2, 'BMW Série 3', 75, TRUE, 'Berline sportive confortable.'),
(2, 'Mercedes C200', 80, TRUE, 'Berline élégante et performante.'),
(3, 'Volkswagen Golf', 50, TRUE, 'Compacte et économique.'),
(3, 'Peugeot 208', 45, TRUE, 'Petite citadine confortable.'),
(4, 'Yamaha MT-07', 40, TRUE, 'Moto sportive et agile.'),
(4, 'Honda CB500F', 38, TRUE, 'Moto fiable et confortable.');


ALTER TABLE vehicule
ADD image VARCHAR(255) NULL;

ALTER TABLE vehicule
CHANGE catecorie_id categorie_id INT NOT NULL;


INSERT INTO themes (titre, description) VALUES
('Voitures électriques', 'Articles sur les voitures électriques'),
('Voyages en voiture', 'Conseils et expériences de voyages en voiture');


INSERT INTO articles (id_client, id_theme, titre, contenu, tags, statut) VALUES
(1, 1, 'Les meilleures électriques 2026', 'Contenu de l\'article sur les voitures électriques.', 'électrique,2026', 'publie'),
(2, 2, 'Roadtrip Maroc', 'Mon expérience d\'un roadtrip au Maroc.', 'voyage,roadtrip', 'publie');


INSERT INTO commentaires (id_client, id_article, contenu) VALUES
(2, 1, 'Merci pour cet article très complet !'),
(1, 2, 'Super récit de voyage !');