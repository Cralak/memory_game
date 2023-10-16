CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(191) UNIQUE NOT NULL,
    pass VARCHAR(200) NOT NULL,
    username VARCHAR(191) UNIQUE NOT NULL,
    date_and_time DATETIME NOT NULL,
    last_connection DATETIME,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8'
ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS scores(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    player_id INT UNSIGNED NOT NULL,
    game_id INT UNSIGNED NOT NULL,
    difficulty ENUM('easy','medium','hard') NOT NULL,
    game_score INT UNSIGNED NOT NULL,
    game_date_and_time DATETIME NOT NULL,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8'
ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS messages(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sender_id INT UNSIGNED NOT NULL,
    game_id INT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    message_date_and_time DATETIME NOT NULL,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8'
ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS games(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(191) NOT NULL,
    PRIMARY KEY(id)
)

CHARACTER SET 'utf8'
ENGINE=INNODB;