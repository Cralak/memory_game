<?php

require_once('common.php');
require_once SITE_ROOT . ('utils/database.php');


$score = $_POST['score'];
$dif = $_POST['dif'];


$pdo = connectToDbAndPOSTPdo();
$pdoStatement = $pdo->prepare("INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
    VALUES(:player_id , '1', :difficulty, :game_score, NOW())");
$pdoStatement->execute([
    ":player_id" => $_SESSION['userId'],
    ":difficulty" => $dif,
    ":game_score" => $score,
]);
