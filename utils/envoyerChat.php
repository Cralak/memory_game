<?php
require_once('common.php');
require_once('database.php');

if (isset($_POST['message'])) {
    $pdo = connectToDbAndPOSTPdo();
    $pdoStatement = $pdo->prepare("INSERT INTO messages(sender_id, message, game_id, message_date_and_time) 
    VALUES(:sender_id , :message, '1', NOW())");    
    $pdoStatement->execute([
        ":sender_id" => $_SESSION['userId'],
        ":message" => $_POST['message'],
    ]);
}