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

    $pdo = connectToDbAndPOSTPdo();

    if(isset($_POST['email']) && isset($_POST['motDePasse'])){
        $Password = hash('sha256', $_POST['motDePasse']);
        $pdoStatement = $pdo->prepare('SELECT id FROM users WHERE email = :email AND pass = :pass');
        $pdoStatement->execute([":email" => $_POST['email'], ":pass" => $Password]);
        $userInfo = $pdoStatement->fetch();
        
        if($userInfo){
            $_SESSION['userId'] = $userInfo->id;
            header("location: game/memory/memory.php");       
            }
        } 

    ?>
    <form method="POST">
        <div class="box1">
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" >
            <?php if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
            <?php endif ?>
            </br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" >
            <?php if (isset($_POST['motDePasse']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['motDePasse'])) : ?>
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



    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT. 'partials/footer.php';
    ?>
    <!------------------footer------------------>


</body>
</html>