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
WHERE games.name = 'The Power Of Memory'
AND difficulty = 'easy'
ORDER BY games.name, difficulty, game_score;
