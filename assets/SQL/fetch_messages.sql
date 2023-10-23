/* Story 11 */

SELECT message, U.username, message_date_and_time, sender_id = 2 AS isSender
FROM messages AS M
INNER JOIN users AS U ON M.sender_id = U.id
WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY
ORDER BY message_date_and_time ASC;