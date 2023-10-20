/* Story 9 */

INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
VALUES('1', '1', 'hard', '2000', '2008-11-11 13:23:44')
ON DUPLICATE KEY UPDATE game_score = '3000';