------------------ TABLE UTILISATEUR ----------------/


CREATE TABLE IF  NOT EXISTS utilisateur(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(191) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(200) NOT NULL,
    pseudo VARCHAR(191) UNIQUE NOT NULL,
    date_et_heure DATETIME NOT NULL,
    derniere_connexion DATETIME,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8';
ENGIN=INNOB;




---------------- TABLE SCORE ----------------/

CREATE TABLE IF  NOT EXISTS score(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_joueur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    difficulte ENUM('FACILE,MOYEN,DIFFICIL') NOT NULL,
    score_partie INT UNSIGNED NOT NULL,
    datetime_partie DATETIME NOT NULL,
    PRIMARY KEY(id),
)

CHARACTER SET 'utf8';
ENGIN=INNOB;


--------------- TABLE MESSAGE ----------------/

CREATE TABLE IF  NOT EXISTS message(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_expediteur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    datetime_message DATETIME NOT NULL,
    PRIMARY KEY(id),
)

CHARACTER SET 'utf8';
ENGIN=INNOB;


---------------- TABLE JEU ----------------/

CREATE TABLE IF  NOT EXISTS jeu(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR NOT NULL,
    PRIMARY KEY(id)

)

CHARACTER SET 'utf8';
ENGIN=INNOB;




----------------------------------Clé Etrangère----------------------------------/

--- Score --- 
ALTER TABLE score
ADD CONSTRAINT fk_score_utilisateur FOREIGN KEY (id_joueur) REFERENCES utilisateur(id) ON DELETE CASCADE;

ALTER TABLE score
ADD CONSTRAINT fk_score_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE;


--- Message ---
ALTER TABLE message
ADD CONSTRAINT fk_message_jeu FOREIGN KEY (id_jeu) REFERENCES jeu(id) ON DELETE CASCADE;

ALTER TABLE message
ADD CONSTRAINT fk_message_utilisateur FOREIGN KEY (id_expediteur) REFERENCES utilisateur(id) ON DELETE CASCADE;




