<!DOCTYPE html>
<html lang="fr">
<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
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
    <form method="POST" action="memory.php">
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