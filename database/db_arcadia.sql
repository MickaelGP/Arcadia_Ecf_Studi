-- Création de la base de données
DROP DATABASE IF EXISTS arcadia;
CREATE DATABASE arcadia;

USE arcadia;

-- Table `image`
DROP TABLE IF EXISTS images;
CREATE TABLE images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image_data BLOB NOT NULL
);

-- Table `habitat`
DROP TABLE IF EXISTS habitats;
CREATE TABLE habitats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL,
  commentaire VARCHAR(255) NULL,
  image_id INT,
  FOREIGN KEY (image_id) REFERENCES images(id)
);
INSERT INTO habitats (nom, description)
 VALUES('La savane',
 'Vaste étendue herbeuse parsemée d arbres épars, foyer des lions. 
 Symphonie de vie sauvage et couleurs éclatantes, offrant une expérience sensorielle inoubliable.'

 );
 INSERT INTO habitats (nom, description)
 VALUES('Le marais',
 'une zone humide dense, abritant une variété de plantes aquatiques, d''oiseaux, de poissons et de reptiles. 
 Les eaux stagnantes et les roseaux offrent un refuge vital pour la biodiversité.'
 );
 INSERT INTO habitats (nom, description)
 VALUES('La jungle',
 'Mystères luxuriants, créatures exotiques, aventures épiques, exploration fascinante, ambiance envoûtante.'
 );
-- Table `race`
DROP TABLE IF EXISTS races;
CREATE TABLE races (
  id INT AUTO_INCREMENT PRIMARY KEY,
  label VARCHAR(50) NOT NULL
);
INSERT INTO races (label) 
  VALUES('Mammifères');
INSERT INTO races (label) 
  VALUES('Reptiles');
INSERT INTO races (label) 
  VALUES('Oiseaux');  
-- Table `role`
DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  label VARCHAR(50) NOT NULL
);
INSERT INTO roles (label) VALUES('administrateur');
INSERT INTO roles (label) VALUES('vétérinaire');
INSERT INTO roles (label) VALUES('employé');

-- Table `service`
DROP TABLE IF EXISTS service;
CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL,
  isValide BOOLEAN
);
INSERT INTO services(nom, description) 
  VALUES ('Restauration', 
    'Nous vous proposons plusieurs possibilités pour vous restaurer.
    Dans notre zoo, vous trouverez des snacks, deux restaurants à thèmes ainsi qu’un coin confiserie.
  ');
INSERT INTO services(nom, description) 
  VALUES ('Visite du Zoo en petit train', 
    'Profitez d’un moment pour voir le zoo comme vous ne l’avez jamais vu et embarquez à bord de notre petit train. 
    Des départs sont prévus toutes les 30 minutes.
  ');
INSERT INTO services(nom, description) 
  VALUES ('Visite gyuidée des habitats', 
    'Venez visiter les habitats de vos animaux préférés avec notre guide.
    Vivez une expérience unique.
    Chaque habitat propose une visite toutes les 1h.
    La visite dure environ 25 minutes. N’hésitez pas, c’est gratuit :)
  ');
-- Table `avis`
DROP TABLE IF EXISTS avis;
CREATE TABLE avis (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pseudo VARCHAR(50) NOT NULL,
  commentaire VARCHAR(255) NOT NULL,
  isValide BOOLEAN
);
INSERT INTO avis (pseudo, commentaire, isValide) 
  VALUES ('ZooFan123', 'J''ai adoré voir les lions', TRUE);
INSERT INTO avis (pseudo, commentaire, isValide) 
  VALUES ('AnimalLover456', 'Les allées étaient sales, doit être amélioré.', FALSE);
INSERT INTO avis (pseudo, commentaire) 
  VALUES ('WildlifeExplorer', 'Le personnel était très serviable et bien informé.');
INSERT INTO avis (pseudo, commentaire, isValide) 
  VALUES ('NatureLover999', 'Belle sélection d''animaux à découvrir.', FALSE);
-- Table `animal`
DROP TABLE IF EXISTS animals;
CREATE TABLE animals (
  id INT AUTO_INCREMENT PRIMARY KEY,
  prenom VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL,
  race_id INT,
  habitat_id INT,
  FOREIGN KEY (race_id) REFERENCES races(id),
  FOREIGN KEY (habitat_id) REFERENCES habitats(id)
);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Simba', 'Un lion de 1O ans', 1, 1);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Sheldon', 'Un python royal', 2, 2);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Rio', 'Un perroquet', 3, 3);

-- Table `utilisateur`
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  role_id INT,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);
INSERT INTO users (username, password, nom, prenom, role_id) VALUES('admin@arcadia.fr', '$2y$12$nPL5T6p2Srsh0Nccwm7.PembOVN/L1LD93hTbjDwJ/mLChn8KMoSu','Doe','John',1);
INSERT INTO users (username, password, nom, prenom, role_id) VALUES('veterinaire@arcadia.fr', '$2y$12$nPL5T6p2Srsh0Nccwm7.PembOVN/L1LD93hTbjDwJ/mLChn8KMoSu','Doe','Bob',2);

-- Table `rapport_veterinaire`
DROP TABLE IF EXISTS rapport_veterinaires;
CREATE TABLE rapport_veterinaires (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date DATE NOT NULL,
  detail VARCHAR(255) NULL,
  nourriture VARCHAR(255) NOT NULL,
  etat VARCHAR(255) NOT NULL,
  quantite INT(11),
  animal_id INT,
  user_id INT,
  FOREIGN KEY (animal_id) REFERENCES animals(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO rapport_veterinaires (date, detail, animal_id, user_id) 
  VALUES ('2024-04-02', 'Examen de routine pour vérifier la santé du lion.', 1, 2);
-- Table alimentation
CREATE TABLE alimentations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_alimentation DATE,
    heure_alimentation TIME,
    nourriture VARCHAR(255),
    quantite DECIMAL(10,2),
    animal_id INT,
    user_id INT,
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);


