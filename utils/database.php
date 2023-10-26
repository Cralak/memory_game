<?php
function connectToDbAndGetPdo(): PDO
{
$dbname = 'memory';
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


/*--------------INSERT-------------*/
function insertusers($pdo, $pseudo, $email, $motDePasse ) :void {

    $insertUser = $pdo-> prepare('INSERT INTO users(username, email, pass) VALUES (:username, :email, :pass)');
    $insertUser -> execute([':email' => $email, ':pass' => $motDePasse, ':username' => $pseudo]);}

/*---------UNIQUE---------*/
function uniquePseudo($pdo,$pseudo):bool{
    $pseudoUsed = $pdo-> prepare('SELECT username FROM users WHERE username =:nom');
    $pseudoUsed->execute([':nom' => $pseudo]);
    $pseudoUsed-> fetch();
    return $pseudoUsed != NULL;
}

function uniqueEmail($pdo,$email):bool{
    $emailUsed = $pdo-> prepare('SELECT email FROM users WHERE email = :email');
    $emailUsed->execute([':email' => $email]);
    $emailUtilise= $emailUsed-> fetch();
    return $emailUsed != NULL;
}

/*----------UPADATE----------*/
function updateEmail($pdo,$newEmail) :void {
    $newerEmail = $pdo -> prepare('UPDATE users SET email = :email WHERE id = :id');
    $newerEmail->execute([':email' => $newEmail,':id' => $_SESSION('userId')]); 
}

function updatePassword($pdo,$newPassword) :void {
    $newerPassword = $pdo -> prepare('UPDATE users SET pass = :pass WHERE id = :id');
    $newerPassword -> execute([':pass' => $newPassword,':id' => $_SESSION('userId')]); 
}


/*------------SELECT----------*/
function oldEmail($pdo, $Email): string
{
    $OldEmail = $pdo->prepare('SELECT email FROM users WHERE id = :id;');
    $OldEmail -> execute(['id' => $_SESSION('userId')]);
    $actualEmail = $OldEmail -> fetch();
    return $actualEmail == $Email;
}

function oldPassword($pdo,$Password): bool {   

    $oldPassword = $pdo->prepare('SELECT pass FROM users WHERE id = :id');
    $oldPassword->execute(['id' => $_SESSION('userId')]);
    $currentPassword = $oldPassword -> fetch();

    $Password = hash('sha256', $Password);

    return $Password == $currentPassword;
}
?>