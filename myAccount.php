<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
<body class="myAccount">
    <!------------------header------------------>
    <?php
        require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>

    <div class="background">
        <img src="assets/images/background.jpg">
        <div class="content">
            <h1>MON PROFIL</h1>
        </div>

    </div>
    <br></br>
    <center>
    <form action="upload_image.php" method="post" enctype="multipart/form-data">
    <label for="nouvelleImage">Sélectionnez une nouvelle image :</label>
    <input type="file" name="nouvelleImage" id="nouvelleImage">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $uploadDir = "images/";  // Répertoire de destination pour les images
        $uploadFile = $uploadDir . basename($_FILES["nouvelleImage"]["name"]);

        if (move_uploaded_file($_FILES["nouvelleImage"]["tmp_name"], $uploadFile)) {
            echo "L'image a été téléchargée avec succès.";

            // Mettez à jour l'URL de l'image dans votre base de données ou où vous stockez cette information.
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }
    ?>
    </center>
    <br></br>    

    <form method="post">
        <input class="appliquer" type="submit" name="disconnect" value="DÉCONNEXION" >
    </form>
    <?php
        if(isset($_POST['disconnect'])){
        session_destroy();
        header("location:main.php");
        } 
    ?>

    <br></br>    
    
    <form class="box" method="POST" action="traitement.php">
        <div>
            <h2>Gestion de l'Email :</h2>
        
            <input class="boite" type="text" id="nom" name="nom" required placeholder="Em@il actuel" ></br>
            </br>
            <input class="boite" type="email" id="email" name="email" required placeholder="Nouvel Em@il" ></br>
                </br>
                <br></br>
                <br></br>
           
            <h2>Gestion du mot de passe :</h2>
        
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe actuel" ></br>
                </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Nouveau Mot de passe" ></br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Confirmer le nouveau mot de passe" ></br>
            </br>
        
        </div>
        </br>
        <input class="appliquer" type="submit" value="APPLIQUER" href="main.php">
        <br></br>   
        <br></br>
        <br></br>
    </form>

    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT. 'partials/footer.php';
    ?>
    <!------------------footer------------------>

</body>
</html>