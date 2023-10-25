<?php
function connectToDbAndGetPdo(): PDO
{
$dbname = 'projet_flash';
$host = 'localhost';
$dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
$user = 'root';
$pass = '';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
    $pdo = new PDO($dsn, $user, $pass, $driver_options);
    return $pdo;
    } catch (PDOException $e) {
    echo 'La connexion à la base de données a échouée.';
    }

}
$pdo = connectToDbAndGetPdo();


function insertusers($pdo, $pseudo, $email, $motDePasse ) :void {

    $insertUser = $pdo-> prepare('INSERT INTO users(username, email, pass) VALUES (:username, :email, :pass)');
    $insertUser -> execute([':email' => $email, ':pass' => $motDePasse, ':username' => $pseudo]);}


function uniquePseudo($pdo,$pseudo):bool{
    $pseudoUsed = $pdo-> prepare('SELECT username FROM users WHERE username =:nom');
    $pseudoUsed->execute([':nom' => $pseudo]);
    $pseudoUtilise= $pseudoUsed-> fetch();
    return $pseudoUsed != NULL;
}

function uniqueEmail($pdo,$email):bool{
    $emailUsed = $pdo-> prepare('SELECT email FROM users WHERE email = :email');
    $emailUsed->execute([':email' => $email]);
    $emailUtilise= $emailUsed-> fetch();
    return $emailUsed != NULL;
}


?>