-- Création de la base de données
DROP DATABASE IF EXISTS arcadia;
CREATE DATABASE arcadia;

USE arcadia;

-- Table `image`
DROP TABLE IF EXISTS images;
CREATE TABLE images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image_data VARCHAR(255) NOT NULL
);

-- Table `habitat`
DROP TABLE IF EXISTS habitats;
CREATE TABLE habitats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL,
  commentaire VARCHAR(255) NULL
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
DROP TABLE IF EXISTS services;
CREATE TABLE services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  description VARCHAR(255) NOT NULL
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
  etat VARCHAR(255) NOT NULL,
  race_id INT,
  habitat_id INT,
  FOREIGN KEY (race_id) REFERENCES races(id) ON DELETE SET NULL,
  FOREIGN KEY (habitat_id) REFERENCES habitats(id) ON DELETE SET NULL
);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Simba', 'Un lion de 1O ans', 1, 1);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Sheldon', 'Un python royal', 2, 2);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Rio', 'Un perroquet', 3, 3);
INSERT INTO animals (prenom, etat, race_id, habitat_id) 
  VALUES ('Kong', 'Un Gorille de 12 ans', 1, 3);

-- Table `utilisateur`
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  role_id INT,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);
INSERT INTO users (username, password, nom, prenom, role_id) VALUES('admin@arcadia.fr', '$2y$12$gN69L9o1bIpnngf1PuAJdeR272u3cj7CRRYjuvwf7Q7bUf.zoFyfS','Doe','John',1);
INSERT INTO users (username, password, nom, prenom, role_id) VALUES('veterinaire@arcadia.fr', '$2y$12$DJQxrCTQMA3aJCice9sDeeH/m8eeegprYX907LdpGOs9C.EIv8Zzq','Doe','Bob',2);
INSERT INTO users (username, password, nom, prenom, role_id) VALUES('employe@arcadia.fr', '$2y$12$rKQ9HO90DU0AzYIRKWXVru3dUpeHPRKsU4cm0.gOijmzR1dDcGUw2','Robert','Dupont',3);

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
INSERT INTO rapport_veterinaires (date, detail, nourriture, etat, animal_id, user_id) 
  VALUES ('2024-04-02', 'Examen de routine pour vérifier la santé du lion.','Viande','Bon', 1, 2);
-- Table alimentation
CREATE TABLE alimentations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_alimentation DATE,
    heure_alimentation TIME,
    nourriture VARCHAR(255),
    quantite DECIMAL(10,2),
    animal_id INT,
    user_id INT,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO alimentations (date_alimentation, heure_alimentation, nourriture, quantite, animal_id, user_id) 
VALUES 
('2024-04-07', '09:00:00', 'Granulés pour girafe', 1550, 3, 3),
('2024-04-07', '10:30:00', 'souris', 27.50, 2, 3),
('2024-04-07', '12:00:00', 'Fruits et légumes pour singes', 3025, 4, 3),
('2024-04-07', '15:00:00', 'Viande crue', 5750, 1, 3);
-- Table Horarire
CREATE TABLE horaires (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ouverture_matin TIME NOT NULL,
  ouverture_soir TIME,
  fermeture_matin TIME,
  fermeture_soir TIME NOT NULL
);
INSERT INTO horaires (ouverture_matin, fermeture_soir) 
VALUES ('08:00:00', '20:00:00');
INSERT INTO horaires (ouverture_matin, fermeture_soir) 
VALUES ('09:00:00', '19:00:00');
-- Table pivot habitats images
CREATE TABLE habitat_image (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    habitat_id INT,
    image_id INT,
    FOREIGN KEY (habitat_id) REFERENCES habitats(id) ON DELETE CASCADE,
    FOREIGN KEY (image_id) REFERENCES images(id) ON DELETE CASCADE
);