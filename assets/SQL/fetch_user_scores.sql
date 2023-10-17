SELECT *
FROM scores as S
INNER JOIN users as U
    ON S.player_id = U.id
WHERE U.username LIKE '%ro%';