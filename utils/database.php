<?php
function connectToDbAndPOSTPdo(): PDO
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

$pdo = connectToDbAndPOSTPdo();


/*--------------INSERT-------------*/
function insertusers($pdo, $pseudo, $email, $motDePasse ) :void {

    $insertUser = $pdo-> prepare('INSERT INTO users(username, email, pass) VALUES (:username, :email, :pass)');
    $insertUser -> execute([':email' => $email, ':pass' => $motDePasse, ':username' => $pseudo]);}

/*---------UNIQUE---------*/
function uniquePseudo($pdo,$pseudo):bool{

    $pseudoUsed = $pdo-> prepare('SELECT username FROM users WHERE username = :username');
    $pseudoUsed->execute([':username' => $pseudo]);
    $pseudoUtilise = $pseudoUsed-> fetch();

    return $pseudoUtilise != NULL;
}

function uniqueEmail($pdo,$email):bool{

    $emailUsed = $pdo-> prepare('SELECT email FROM users WHERE email = :email');
    $emailUsed->execute([':email' => $email]);
    $emailUtilise = $emailUsed-> fetch();

    return $emailUtilise != NULL;

}

function memeEmail($pdo,$newEmail,$userId) :bool {
    $currentEmail = $pdo -> prepare('SELECT email FROM users WHERE id = :id');
    $currentEmail->execute([':id' => $_SESSION['userId']]); 
    $CurrentEmail = $currentEmail-> fetch();

    return $CurrentEmail == $newEmail;
}

function memePassword($pdo,$newPassword,$userId) :bool {
    $currentPass = $pdo -> prepare('SELECT pass FROM users WHERE id = :id');
    $currentPass->execute([':id' => $userId]); 
    $CurrentPass = $currentPass-> fetch();

    return $CurrentPass == $newPassword;
}
/*----------UPADATE----------*/
function updateEmail($pdo,$newEmail,$userId) :void {
    $newerEmail = $pdo -> prepare('UPDATE users SET email = :email WHERE id = :id');
    $newerEmail->execute([':email' => $newEmail,':id' => $userId]); 
}

function updatePassword($pdo,$newPassword,$userId) :void {
    $newerPassword = $pdo -> prepare('UPDATE users SET pass = :pass WHERE id = :id');
    $newerPassword -> execute([':pass' => $newPassword,':id' => $userId]); 
}


/*------------SELECT----------*/


function PasswordUse($pdo,$password) : bool {
    $PasswordUsed = $pdo->prepare('SELECT pass FROM users WHERE pass = :pass');
    $PasswordUsed->execute([':pass' => $password]);
    $Password_utilise = $PasswordUsed -> fetch();
    return isset($Password_utilise -> pass);
}


function emailUse($pdo,$email) : bool {
    $emailUsed = $pdo->prepare('SELECT email FROM users WHERE email = :email');
    $emailUsed->execute([':email' => $email]);
    $email_utilise = $emailUsed -> fetch();
    return isset($email_utilise -> mail);
}



function oldEmail($pdo, $Email,$userId): bool
{
    $OldEmail = $pdo->prepare('SELECT email FROM users WHERE id = :id;');
    $OldEmail -> execute(['id' => $userId]);
    $actualEmail = $OldEmail -> fetchColumn();

    return $actualEmail == $Email;
    
}

function oldPassword($pdo,$Password, $userId): bool {   

    $oldPassword = $pdo->prepare('SELECT pass FROM users WHERE id = :id');
    $oldPassword->execute(['id' => $userId]);
    $currentPassword = $oldPassword -> fetchColumn();
    $Password = hash('sha256', $Password);

    
    return $currentPassword == $Password;
}


/*---------------CONNEXION------------*/

function login($pdo, $email, $password): void {
$pdoStatement = $pdo->prepare('SELECT id FROM users WHERE email = :email AND pass = :pass');
$pdoStatement->execute([":email" => $email, ":pass" => $password]);
$userInfo = $pdoStatement->fetch();

if($userInfo){
    $_SESSION['userId'] = $userInfo->id;
    header("location: game/memory/memory.php");       
    }
}
?>