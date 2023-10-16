------ TABLE UTILISATEUR -------/


CREATE TABLE IF  NOT EXIST utilisateur(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(191) NOT NULL,
    mot_de_passe VARCHAR(200) NOT NULL,
    pseudo VARCHAR(191) NOT NULL,
    date_et_heure DATETIME NOT NULL,
    derniere_connexion DATETIME,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8';

----- INSCRIPTION --------------/

INSERT INTO utilisateur(id, email, mot_de_passe, pseudo, date_et_heure, derniere_connexion)
VALUE  (1, 'superman@gmail.com', 'superman69!', 'xX_superman_Xx', '27/01/46 17:20', NULL)


------ TABLE SCORE ----------------/

CREATE TABLE score(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_joueur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    difficulte ENUM('FACILE,MOYEN,DIFFICILE') NOT NULL,
    score_partie INT UNSIGNED NOT NULL,
    datetime_partie DATETIME NOT NULL,
    PRIMARY KEY(id)

)

CHARACTER SET 'utf8';

------ TABLE MESSAGE ----------------/

CREATE TABLE message(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_expediteur INT UNSIGNED NOT NULL,
    id_jeu INT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    datetime_message DATETIME NOT NULL,
    PRIMARY KEY(id)

)

CHARACTER SET 'utf8';

------ TABLE JEU ----------------/

CREATE TABLE jeu(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR NOT NULL,
    PRIMARY KEY(id)

)

CHARACTER SET 'utf8';

