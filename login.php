<!DOCTYPE html>
<html lang="fr">

<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT . 'partials/head.php';
    require_once SITE_ROOT . 'utils/database.php';
   ?>



<body class="login">

    <!------------------header------------------>
    <?php
        require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>


    <div class="background">
        <img src="assets/images/background4.jpg">
        <div class="content">
            <h1>CONNEXION</h1>
        </div>
    </div>
    <br></br>
    <br></br>
    <?php

    $pdo = connectToDbAndGetPdo();

    if(isset($_GET['email']) && isset($_GET['motDePasse'])){
        $Password = hash('sha256', $_GET['motDePasse']);
        $pdoStatement = $pdo->prepare('SELECT id FROM users WHERE email = :email AND pass = :pass');
        $pdoStatement->execute([":email" => $_GET['email'], ":pass" => $Password]);
        $userInfo = $pdoStatement->fetch();
        
        if($userInfo){
            $_SESSION['userId'] = $userInfo->id;
            header("location: game/memory/memory.php");       
            }
        } 

    ?>
    <form method="GET">
        <div class="box1">
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" >
            <?php if (isset($_GET['email']) && !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
            <?php endif ?>
            </br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" >
            <?php if (isset($_GET['newPassword']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_GET['motDePasse'])) : ?>
                <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                </p>
            <?php endif ?>
            </br>
            </br>
            <input class="connexion" type="submit" value="CONNEXION">
            </br>
            </br>
            <span>Vous n'avez pas de compte ? Inscrivez vous <a href="register.php">ici</a></span>   
        </div>
        <br></br>
        <br></br>
    </form>
    <br>
    </br>
    <br>
    </br>
    <br>
    </br>
    <!------------------chat------------------>
    <?php
    require_once SITE_ROOT. 'partials/chat.php';
    ?>
    <!------------------chat------------------>




    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT. 'partials/footer.php';
    ?>
    <!------------------footer------------------>


</body>
</html>