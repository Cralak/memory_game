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
    $pdoStatement = $pdo->prepare('SELECT email,pass FROM users 
    WHERE email = :email AND pass = :pass');
    $pdoStatement->execute([":email" => ($_POST['email']), ":pass" => ($_POST['motDePasse'])]);
    $userInfo = $pdoStatement->fetch();
    $_SESSION['email'] = $userInfo->email;
    $_SESSION['motDePasse'] = $userInfo->pass;
    ?>
    <form method="POST" action="game/memory/memory.php">
        <div class="box1">
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" >
            </br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" >
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