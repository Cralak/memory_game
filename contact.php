<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
<body class="contact">
    <!------------------header------------------>
    <?php
    require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>


    <div class="background">
        <img src="assets/images/background.jpg">
        <div class="content">
            <h1>NOUS CONTACTER</h1>
        </div>
    </div>  

    <div class="cadre">
        <div class="tel">
            <div><img src="assets/images/phonelogo.png"></div>
            <div>06 05 04 03 02</div>
        </div>
        <div class="mail">
            <div><img src="assets/images/maillogo.png"></div>
            <div>support@powerofmemory.com</div>
        </div>
        <div class="ville">
            <div><img src="assets/images/locationlogo.png"></div>
            <div>Paris</div>
        </div>
    </div>

    <form method="POST" action="traitement.php">
        <div class="form-contact">
            <input class="boite" type="nom" id="nom" name="nom" required placeholder="Nom">
            <input class="boite" type="email" id="email" name="email" required placeholder="Email" >
        </div>
        <div class="form-contact2">
        <input class="boite2" type="sujet" id="sujet" name="sujet" required placeholder="Sujet" >
        </div>
        <div class="form-contact3">
            <textarea pseudo = "message"passe = "message"required placeholder="Message">
            </textarea>
        </div>
    </form>

    </form>
        <input class="connexion" type="submit" value="Envoyer" href="main.php">
        <br></br>   
        <br></br>
        <br></br>
    </form>
    
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