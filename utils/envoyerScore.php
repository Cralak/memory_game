<?php

require_once('common.php');
require_once SITE_ROOT . ('utils/database.php');


if(isset($_POST['score']) && isset($_POST['dif']))
{
    $score = $_POST['score'];
    if ($_POST['dif'] == 0){
        $dif = "easy";
    } else if ($_POST['dif'] == 1){
        $dif = "medium";
    } else if ($_POST['dif'] == 2){
        $dif = "hard";
    }
    
    
    
    $pdo = connectToDbAndGetPdo();
    $pdoStatement = $pdo->prepare("INSERT INTO scores(player_id, game_id, difficulty, game_score, game_date_and_time)
        VALUES(:player_id , '1', :difficulty, :game_score, NOW())");
    $pdoStatement->execute([
        ":player_id" => $_SESSION['userId'],
        ":difficulty" => $dif,
        ":game_score" => $score,
    ]);
}

?> 
