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


    <?php if()


    <form method="POST">
        <div class="box1">
            <input class="boite" type="text" id="nom" name="nom" required placeholder="Nom" ></br>
            
            <?php if(isset($_POST['nom'])): ?>
                <?php if(!preg_match('/.{4,}$/', $_POST ['nom'])):  ?>
                    <p style="color: red;">Le pseudo doit avoir au moins 4 caractères.</p>
                <?php endif ?>
            <?php endif ?>


            </br>
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" ></br>

            <?php if(isset($_POST['email'])): ?>
                <?php if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):?>
                    <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
                <?php endif?>
            <?php endif?>

            </br>

            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" ></br>

            <?php if(isset($_POST['motDePasse'])): ?>
                <?php if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/',$_POST ['motDePasse'])): ?>
                    <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                    </p>
                <?php endif?>
                <?php elseif (isset($_POST['motDePasse'])): ?>
                    <?php $_POST['motDePasse'] = hash('256',$_POST['motDePasse']); ?>
            <?php endif?>


            </br>
            <input class="boite" type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" required placeholder="Confirmer le mot de passe" ></br>
            
            <?php if(isset($_POST['confirmationMotDePasse'])): ?>
                <?php if ($_POST ['motDePasse'] !== $_POST['confirmationMotDePasse']) : ?>
                    <p style="color: red;">Le mot de passe doit être le même.</p>
                <?php endif ?>
            <?php endif ?>

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


    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT. 'partials/footer.php';
    ?>
    <!------------------footer------------------>

</body>
</html>
