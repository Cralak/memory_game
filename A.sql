CREATE DATABASE tgfdp CHARACTER SET 'utf8'
USE tgfdp;

CREATE TABLE scores (
    id                  INT UNSIGNED NOT NULL AUTO_INCREMENT,
    player              VARCHAR(60) NOT NULL,
    game                VARCHAR(30) NOT NULL,
    difficulty          ENUM('easy','medium','hard') NOT NULL,
    game_score          INT UNSIGNED NOT NULL,
    game_date_and_time  DATETIME NOT NULL,
    PRIMARY KEY(id)
)
CHARACTER SET 'utf8'
ENGINE=INNODB;

ALTER TABLE scores
MODIFY game_date_and_time DATETIME DEFAULT CURRENT_TIMESTAMP;

INSERT INTO scores(player,game,difficulty,game_score) VALUES
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000'),
('joueur1','memory','easy','2000');

INSERT INTO scores(player,game,difficulty,game_score)VALUES
('joueur2','memories','hard','2000'),
('joueur2','memories','hard','2000'),
('joueur2','memories','hard','2000'),
('joueur2','memories','hard','2000'),
('joueur2','memories','hard','2000'),
('joueur2','memories','hard','2000');


