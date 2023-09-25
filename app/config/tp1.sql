DROP DATABASE IF EXISTS tp_1;

-- Création et utilisation de la base de données
CREATE DATABASE tp_1;
USE tp_1;

CREATE TABLE Utilisateur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    telephone INT(20),
    genre VARCHAR(10)
);

INSERT INTO Utilisateur (nom, prenom, telephone, genre)
VALUES
    ('Tom', 'Cruise', 1231144747, 'male'),
    ('Paul', 'Holland', 1234567891, 'male'),
    ('Georgina', 'Hulk', 1235678954, 'female'),
    ('Mikaela', 'Stark', 1234578965, 'female'),
    ('Marc', 'Thor', 1235647859, 'male'),
    ('Polo', 'Johnson', 1235698563, 'male'),
    ('John', 'Fernandes', 1201245789, 'female'),
    ('Phil', 'Eric', 1112354785, 'male'),
    ('Jules', 'Besson', 12356587418, 'male'); 