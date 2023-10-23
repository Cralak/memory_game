<!DOCTYPE html>
<html lang="fr">
<head>
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
            <h1>INSCRIPTION</h1>
        </div>
    </div>
    </br>
    <br>

    
    </br>
    <form method="POST" action="traitement.php">
        <div class="box1">
            <input class="boite" type="text" id="nom" name="nom" required placeholder="Nom" ></br>
            </br>
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" ></br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" ></br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Confirmer le mot de passe" ></br>
            </br>
            <input class="connexion" type="submit" value="S'INSCRIRE" href="main.php">
            </br>  
            </br>  
            <span>Vous avez déjà un compte ? Connectez vous <a href="login.php">ici</a></span> 
            <br></br>
        </div>
        </br>
        </br>
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
