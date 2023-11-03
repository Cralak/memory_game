<?php
require_once('database.php');
require_once('common.php');
$pdo = connectToDbAndPOSTPdo();
$pdoStatement = $pdo->prepare("SELECT U.username AS senderName, M.sender_id AS senderId, M.message_date_and_time as dateTime, M.message AS message
          FROM messages AS M
          INNER JOIN users AS U
          ON U.id = M.sender_id
          --WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY
          ORDER BY M.message_date_and_time DESC");
$pdoStatement->execute();
