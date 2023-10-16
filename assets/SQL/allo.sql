---------------------------------- TABLE UTILISATEUR SCORE MESSAGE JEU---------------------------------/


CREATE TABLE IF NOT EXISTS utilisateur(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(191) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(200) NOT NULL,
    pseudo VARCHAR(191) UNIQUE NOT NULL,
    date_et_heure DATETIME NOT NULL,
    derniere_connexion DATETIME,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8';
ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS score(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_joueur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    difficulte ENUM('FACILE','MOYEN','DIFFICIL') NOT NULL,
    score_partie INT UNSIGNED NOT NULL,
    datetime_partie DATETIME NOT NULL,
    PRIMARY KEY(id),
)

CHARACTER SET 'utf8';
ENGINE=INNODB;




CREATE TABLE IF NOT EXISTS messages(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_expediteur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    datetime_message DATETIME NOT NULL,
    PRIMARY KEY(id),
)

CHARACTER SET 'utf8';
ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS jeu(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR NOT NULL,
    PRIMARY KEY(id)

)

CHARACTER SET 'utf8';
ENGINE=INNODB;




----------------------------------Clé Etrangère----------------------------------/

--- Score --- 
ALTER TABLE score
ADD CONSTRAINT fk_score_utilisateur FOREIGN KEY (id_joueur) REFERENCES utilisateur(id) ON DELETE CASCADE;

ALTER TABLE score
ADD CONSTRAINT fk_score_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE;


--- Message ---
ALTER TABLE messages
ADD CONSTRAINT fk_message_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE;

ALTER TABLE messages
ADD CONSTRAINT fk_message_utilisateur FOREIGN KEY (id_expediteur) REFERENCES utilisateur(id) ON DELETE CASCADE;


---------------------------------- Insertions ----------------------------------/

INSERT INTO utilisateur(email, mot_de_passe, pseudo, date_et_heure, derniere_connexion)
VALUES('cralakgaming@gmail.com', 'iLoveGaming', 'Cralak', '2019-10-10', NULL),
('loma@gmail.com', 'loma55', 'lomaDeezNutz', '2018-01-10', NULL),
('proutox@gmail.com', 'pwoutow', 'ProutoxLeGamer', '2021-10-05', NULL),
('viande@gmail.com', 'FreinCassé69', 'LeGrandViande', '2001-11-09', NULL),
('borkevgolem@gmail.com', 'FreinTropCourt', 'brokevo', '2016-02-11', NULL);

INSERT INTO utilisateur(email,mot_de_passe,pseudo,date_et_heure)
VALUES('drocsidgaming@gmail.com', '1234', 'Drocsid', '2010-10-10');

UPDATE utilisateur
SET email = 'drocsidddddddgaming@gmail.com' AND SET pseudo = "XtremDrocsid"
WHERE id = 4;

UPDATE utilisateur
SET pseudo = "XtremDrocsid" 
WHERE id = 4;

