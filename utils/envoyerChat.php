<?php
require_once('database.php');
require_once('common.php');

if (isset($_POST['message'])) {
    $pdo = connectToDbAndGetPdo();
    $pdoStatement = $pdo->prepare("INSERT INTO messages(sender_id, message, game_id, message_date_and_time) 
    VALUES(:id , :content, '1', NOW())");    
    $pdoStatement->execute([
        ":id" => $_SESSION['userId'],
        ":content" => $_POST['message'],
    ]);
}