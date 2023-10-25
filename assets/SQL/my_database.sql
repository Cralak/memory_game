/* Story 1 */

CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(90) UNIQUE NOT NULL,
    pass VARCHAR(191) NOT NULL,
    username VARCHAR(30) UNIQUE NOT NULL,
    date_and_time DATETIME DEFAULT CURRENT_TIMESTAMP,
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

ALTER TABLE scores
ADD CONSTRAINT fk_scores_users FOREIGN KEY (player_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE scores
ADD CONSTRAINT fk_scores_games FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE messages
ADD CONSTRAINT fk_messages_games FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE messages
ADD CONSTRAINT fk_messages_users FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE;

/* Story 2 */

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES('1', '1', 'Bonjour', '2002-10-10 10:19:56'),
    ('1', '1', 'Salut', '2002-10-10 10:20:56'),
    ('1', '1', 'Jjajjaj', '2002-10-10 10:19:56'),
    ('1', '1', 'magab', '2019-10-10 10:19:56'),
    ('1', '1', 'jouef', '2005-10-10 10:19:56');

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES( '2', '1', 'jajajajaj', '2002-10-10 10:19:56'),
    ('2', '1', 'Mamoumimama', '2002-10-10 10:20:56'),
    ('2', '1', 'gounbaagaga', '2002-10-10 10:19:56'),
    ('2', '1', 'kekekekekekek', '2023-10-17 11:19:56'),
    ('2', '1', 'MOLABABABABAATORORO', '2005-10-10 10:19:56');

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES('3', '1', 'RIMOU RIMAMA TOUTOU BATAPA', '2002-10-10 10:19:56'),
    ('3', '1', 'JUIFOUFOU', '2002-10-10 10:20:56'),
    ('3', '1', 'MOUSLINE', '2002-10-10 10:19:56'),
    ('3', '1', 'RIGABO', '2019-10-10 10:19:56'),
    ('3', '1', '15', '2005-10-10 10:19:56');

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES('4', '1', 'JSP RAHHHHH', '2002-10-10 10:19:56'),
    ('4', '1', 'NONONONONO', '2002-10-10 10:20:56'),
    ('4', '1', 'niq', '2002-10-10 10:19:56'),
    ('4', '1', 'jabed', '2019-10-10 10:19:56'),
    ('4', '1', 'raminou', '2005-10-10 10:19:56');

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES('5', '1', 'ZIZI!!!', '2002-10-10 10:19:56'),
    ('5', '1', 'JOUEUF', '2002-10-10 10:20:56'),
    ('5', '1', 'KFJBSF', '2002-10-10 10:19:56'),
    ('5', '1', 'EFKLNQELKF F', '2019-10-10 10:19:56'),
    ('5', '1', 'PJZAKJFD DSFK F', '2005-10-10 10:19:56');

/* Story 2 */

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('1', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('1', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('1', '1', 'easy', '2000', '2008-11-11 13:23:44'),
('1', '1', 'medium', '2000', '2008-11-11 13:23:44'),
('1', '1', 'hard', '2000', '2008-11-11 13:23:44');

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('2', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('2', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('2', '1', 'easy', '2000', '2008-11-11 13:23:44'),
('2', '1', 'medium', '2000', '2008-11-11 13:23:44'),
('2', '1', 'hard', '2000', '2008-11-11 13:23:44');

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('3', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('3', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('3', '1', 'easy', '2000', '2008-11-11 13:23:44'),
('3', '1', 'medium', '2000', '2008-11-11 13:23:44'),
('3', '1', 'hard', '2000', '2008-11-11 13:23:44');

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('4', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('4', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('4', '1', 'easy', '2000', '2008-11-11 13:23:44'),
('4', '1', 'medium', '2000', '2008-11-11 13:23:44'),
('4', '1', 'hard', '2000', '2008-11-11 13:23:44');

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('5', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('5', '1', 'hard', '2000', '2008-11-11 13:23:44'),
('5', '1', 'easy', '2000', '2008-11-11 13:23:44'),
('5', '1', 'medium', '2000', '2008-11-11 13:23:44'),
('5', '1', 'hard', '2000', '2008-11-11 13:23:44');

/* Story 2 */

INSERT INTO users(email, pass, username, date_and_time, last_connection)
VALUES('cralakgaming@gmail.com', 'iLoveGaming', 'Cralak', '2019-10-10', NULL),
('loma@gmail.com', 'loma55', 'lomaDeezNutz', '2018-01-10', NULL),
('proutox@gmail.com', 'pwoutow', 'ProutoxLeGamer', '2021-10-05', NULL),
('viande@gmail.com', 'FreinCassé69', 'LeGrandViande', '2001-11-09', NULL),
('borkevgolem@gmail.com', 'FreinTropCourt', 'brokevo', '2016-02-11', NULL);


/* Story 4 */

UPDATE users
SET pass = 'mypassword123'
WHERE id = 3;


UPDATE users
SET email = 'drocsidddddddgaming@gmail.com'
WHERE (id = 4 AND PASS = 'FreinCassé69');


/* Story 5 */

SELECT *
FROM users
WHERE email = 'cralakgaming@gmail.com' AND pass = 'iLoveGaming';

/* Story 6 */

INSERT INTO games(name)
VALUES('The Power Of Memory');


/* Story 7 */

SELECT games.name, users.username, difficulty, game_score
FROM scores
INNER JOIN games ON games.id=scores.game_id
INNER JOIN users ON users.id=scores.player_id
ORDER BY games.name, difficulty, game_score;

/* Story 8 */

SELECT games.name, users.username, difficulty, game_score
FROM scores
INNER JOIN games ON games.id=scores.game_id
INNER JOIN users ON users.id=scores.player_id
WHERE games.name LIKE '%Power%'
AND difficulty = 'easy'
ORDER BY games.name, 
(CASE
    WHEN difficulty = 'easy' THEN 1
    WHEN difficulty = 'medium' THEN 2
    WHEN difficulty = 'hard' THEN 3
END) DESC, game_score ASC;

/* Story 9 */

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('1', '1', 'hard', '2000', '2008-11-11 13:23:44')
ON DUPLICATE KEY UPDATE game_score = '3000', game_date_and_time = NOW();

/* Story 10 */

INSERT INTO messages(sender_id, game_id, message, message_date_and_time)
VALUES('3', '1', 'AAAAAHHHHHHHHH', NOW());

/* Story 11 */

SELECT message, U.username, message_date_and_time, sender_id = 2 AS isSender
FROM messages AS M
INNER JOIN users AS U ON M.sender_id = U.id
WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY
ORDER BY message_date_and_time ASC;

/* Story 12 */

SELECT U.username, S.*
FROM scores as S
INNER JOIN users as U
    ON S.player_id = U.id
WHERE U.username LIKE '%ro%'
ORDER BY game_date_and_time ASC;