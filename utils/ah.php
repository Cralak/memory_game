<?php
require_once('common.php');
require_once('../A.php');

$searchValue = isset($_POST['search']) ? $_POST['search']:"";
$pdo = connectToDbAndPOSTPdo();
$pdoStatment = $pdo->prepare("SELECT player,game,difficulty,game_score,game_date_and_time
    FROM scores
    WHERE (player LIKE '%$searchValue%') OR (game LIKE '%$searchValue%') OR (difficulty LIKE '%$searchValue%') OR (game_score LIKE '%$searchValue%') OR (game_date_and_time LIKE '%$searchValue%')
    ORDER BY difficulty DESC;");
$pdoStatment->execute();
$scores = $pdoStatment->fetchAll();
