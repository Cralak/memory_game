/* Story 1 */

CREATE DATABASE services_db CHARACTER SET 'utf8';

USE services_db;

/* Story 1*/

CREATE TABLE utilisateurs (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  pseudo            VARCHAR(40) UNIQUE NOT NULL,
  email             VARCHAR(90) UNIQUE NOT NULL,
  mot_de_passe      VARCHAR(191) NOT NULL,
  adresse           VARCHAR(80) DEFAULT NULL,
  code_postal       VARCHAR(80) DEFAULT NULL,
  ville             VARCHAR(80) DEFAULT NULL,
  pays              VARCHAR(80) DEFAULT NULL,
  portable          VARCHAR(30) DEFAULT NULL,
  fixe              VARCHAR(30) DEFAULT NULL,
  date_inscription  DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE = INNODB;

CREATE TABLE services (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_utilisateur    INT UNSIGNED NOT NULL,
  nom               VARCHAR(80) NOT NULL,
  description       VARCHAR(80) NOT NULL,
  adresse           VARCHAR(80) NOT NULL,
  code_postal       VARCHAR(80) NOT NULL,
  ville             VARCHAR(80) NOT NULL,
  pays              VARCHAR(80) NOT NULL,
  date_service      DATETIME NOT NULL,
  informations      TEXT DEFAULT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_utilisateur)  REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE services_utilisateurs (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_service        INT UNSIGNED NOT NULL,
  id_utilisateur    INT UNSIGNED NOT NULL,
  date_inscription  DATETIME NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_service)      REFERENCES services(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_utilisateur)  REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE messages (
  id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
  id_expediteur   INT UNSIGNED NOT NULL,
  id_receveur     INT UNSIGNED NOT NULL,
  contenu         TEXT,
  date_envoie     DATETIME NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (id_expediteur)   REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_receveur)     REFERENCES utilisateurs(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB;

/* Story 2 */

INSERT INTO utilisateurs (pseudo, email, mot_de_passe, date_inscription)
VALUES ('Pseudo1', 'hello@free.fr', '123456', NOW());

INSERT INTO utilisateurs (pseudo, email, mot_de_passe, adresse, code_postal, ville, pays, portable, fixe, date_inscription)
VALUES
('Pseudo2', 'hello2@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo3', 'hello3@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo4', 'hello4@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo5', 'hello5@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo6', 'hello6@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo7', 'hello7@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo8', 'hello8@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo9', 'hello9@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo10', 'hello10@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW()),
('Pseudo11', 'hello11@free.fr', '123456', '2 rue du lac', '75019', 'Paris', 'France', '0602030405', '0102030405', NOW());

/* Story 3 */

UPDATE utilisateurs set adresse = '2 rue du lac', code_postal = '75019', ville = 'Paris', pays = 'France', portable = '0602030405', fixe = '0102030405'
WHERE id = 1;

/* Story 4 */

INSERT INTO services (id_utilisateur, nom, description, adresse, code_postal, ville, pays, date_service)
VALUES
(1, 'Laver ma vaisselle', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-28 15:01'),
(7, 'Laver ma voiture', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-18 13:01'),
(5, 'Peindre mes murs', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-18 15:01'),
(4, 'Chasser les pokemons', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-16 15:01'),
(3, 'Monter mon lave vaisselle', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-13 15:01'),
(3, 'Repasser mes chemises', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-12 12:01'),
(9, 'M''aider à trouver une idée de service', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-09 15:01'),
(11, 'Sortir mes chiens', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-02 11:01'),
(1, 'Dire bonjour à mes chats', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-25 12:22'),
(7, 'Aller se promener', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2019-11-01 09:01');

INSERT INTO services (id_utilisateur, nom, description, adresse, code_postal, ville, pays, date_service)
VALUES
(1, 'Laver ma vaisselle', 'rendez-vous en forme !', '56 boulevard du champs', '75001', 'Paris', 'France', '2024-11-28 15:01');


/* Story 6 */

INSERT INTO services_utilisateurs (id_service, id_utilisateur, date_inscription)
VALUES
(1, 5, '2019-11-15 11:18'),
(2, 6, '2019-11-15 11:18'),
(3, 8, '2019-11-15 11:18'),
(4, 2, '2019-11-15 11:18'),
(5, 4, '2019-11-15 11:18'),
(6, 9, '2019-11-15 11:18'),
(7, 10, '2019-11-15 11:18'),
(8, 11, '2019-11-15 11:18'),
(3, 8, '2019-11-15 11:18'),
(10, 3, '2019-11-15 11:18'),
(6, 2, '2019-11-15 11:18'),
(7, 10, '2019-11-15 11:18');

/* Story 7 */

ALTER TABLE messages
MODIFY date_envoie DATETIME DEFAULT CURRENT_TIMESTAMP;


INSERT INTO messages (id_expediteur, id_receveur, contenu)
VALUES
(1, 2, 'Salut !'),
(2, 1, 'Ça va bien, merci !'),
(1, 3, 'Besoin daide pour le lavage de vaisselle ?'),
(3, 1, 'Bien sûr, quand ?'),
(4, 1, 'Ton service de chasser les pokémons mintéresse.'),
(1, 4, 'Salut ! Je taccompagnerai pour chasser les pokémons.'),
(5, 7, 'Besoin de laver ta voiture ?'),
(7, 5, 'Oui, quand ?'),
(6, 11, 'Peux-tu sortir mes chiens ?'),
(11, 6, 'Bien sûr, quand ?'),
(8, 9, 'Besoin didées pour un service ?'),
(9, 8, 'Parlons de tes compétences et passions.'),
(10, 7, 'Promenade ce week-end ?'),
(7, 10, 'Samedi après-midi ?'),
(3, 4, 'Besoin daide pour monter un lave-vaisselle ?'),
(4, 3, 'Quand ?'),
(11, 5, 'Chats ?'),
(5, 11, 'À quelle heure ?'),
(6, 3, 'Service de repassage ?'),
(3, 6, 'Oui, combien de chemises ?'),
(8, 4, 'Idée de service ?'),
(4, 8, 'Discutons-en.'),
(9, 10, 'Sortir mes chiens samedi ?'),
(10, 9, 'Quelle heure ?');


/* Story 8 */

SELECT u1.pseudo AS expediteur, u2.pseudo AS receveur,contenu,date_envoie
FROM messages
RIGHT JOIN utilisateurs AS u1 ON messages.id_expediteur = u1.id
RIGHT JOIN utilisateurs AS u2 ON messages.id_receveur = u2.id
WHERE id_expediteur = 1 OR id_receveur = 1
ORDER BY date_envoie DESC;


/* Story 9 */

SELECT u1.pseudo AS expediteur, u2.pseudo AS receveur , contenu,date_envoie
FROM messages
RIGHT JOIN utilisateurs AS u1 ON messages.id_expediteur = u1.id
RIGHT JOIN utilisateurs AS u2 ON messages.id_receveur = u2.id
WHERE (id_expediteur = 1 AND id_receveur = 2) OR (id_expediteur = 2 AND id_receveur = 1)
ORDER BY date_envoie DESC;

/* Story 10  Manque une condition */ 

SELECT DISTINCT s.nom, s.description, s.adresse, s.code_postal,s.ville,s.pays,s.date_service,s.informations, u1.pseudo AS createur , u2.pseudo AS volontaire
FROM services AS s
LEFT JOIN utilisateurs AS u1 ON s.id_utilisateur = u1.id
LEFT JOIN services_utilisateurs AS su ON s.id_utilisateur = su.id
LEFT JOIN utilisateurs AS u2 ON su.id_utilisateur = u2.id
WHERE date_service > NOW()
AND u2.pseudo IS NULL
AND s.nom LIKE '%vaisselle%'
OR s.code_postal = '75001'
OR s.ville = 'Paris'
OR s.pays = 'France'
ORDER BY s.date_service DESC, s.ville ASC;

SELECT U.pseudo, S.nom, S.ville, S.pays, S.date_service, U2.pseudo AS Volontaire
FROM services as S 
LEFT JOIN utilisateurs AS U ON S.id_utilisateur = U.id
LEFT JOIN services_utilisateurs AS SU ON SU.id_service = S.id
LEFT JOIN utilisateurs AS U2 ON SU.id_utilisateur = U2.id
WHERE S.ville LIKE 'Paris'
AND S.pays LIKE 'France'
AND U2.pseudo IS NULL
ORDER BY S.date_service DESC, S.ville ASC


/* Story 11 */
SELECT services.*, description, u1.portable, u1.pseudo  AS createur, u2.pseudo AS inscrit
FROM services
INNER JOIN services_utilisateurs ON services.id = services_utilisateurs.id_service
INNER JOIN utilisateurs AS u1 ON services.id_utilisateur = u1.id
INNER JOIN utilisateurs AS u2 ON services_utilisateurs.id_utilisateur = u2.id;




/* Story 12 */

DELETE FROM services
WHERE id = '4'

/* Story 13 */

DELETE FROM services_utilisateurs
WHERE id_service = '7' AND id_utilisateur = '9'

/* Story 14 */

DELETE FROM utilisateurs
WHERE id = '7'

/* Story 15 */

DELETE FROM messages
WHERE id = '7';

/* Story 16 A tester si les bons résultats sont retournés */
SELECT u.pseudo AS pseudo_createur_service,s.nom AS nom_service,s.description AS descritpion_service,s.adresse AS adresse_service,s.code_postal AS code_postal_service, s.ville AS ville_service, s.pays AS pays_service, s.date_service, s.informations AS informations_service, u.pseudo AS pseudo_utilisateur,u.email AS mail_utilisateur,u.adresse AS adresse_utilisateur,u.code_postal AS code_postal_utilisateur, u.ville AS ville_utilisateur,u.pays AS pays_utilisateur,u.portable AS portable_utlisateur, u.fixe AS fixe_utilisateur,u.date_inscription AS date_inscription_utilisateur 
    
    (SELECT COUNT(*) FROM services_utilisateurs su WHERE su.id_utilisateur = us.id) AS nombre_services_participes
    FROM services s
    JOIN utilisateurs u ON s.id_utilisateur = u.id
    JOIN utilisateurs us ON s.id_utilisateur = us.id
    ORDER BY s.date_service DESC, s.ville ASC, s.nom ASC;

/* Story 17 */

SELECT u.pseudo AS pseudo_createur_service,s.nom AS nom_service,s.description AS descritpion_service,s.adresse AS adresse_service,s.code_postal AS code_postal_service, s.ville AS ville_service, s.pays AS pays_service, s.date_service, s.informations AS informations_service, u.pseudo AS pseudo_utilisateur,u.email AS mail_utilisateur,u.adresse AS adresse_utilisateur,u.code_postal AS code_postal_utilisateur, u.ville AS ville_utilisateur,u.pays AS pays_utilisateur,u.portable AS portable_utlisateur, u.fixe AS fixe_utilisateur,u.date_inscription AS date_inscription_utilisateur
FROM services s
JOIN utilisateurs u ON s.id_utilisateur = u.id
JOIN utilisateurs us ON s.id_utilisateur = us.id
WHERE u.id = 3
ORDER BY s.date_service ASC, s.ville ASC, s.nom ASC
LIMIT 1;
