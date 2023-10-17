SELECT message, U.username, message_date_and_time,
FROM messages AS M
INNER JOIN users AS U
    ON M.player_id = U.id
WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY;