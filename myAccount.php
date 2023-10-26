<?php 
require_once 'utils/common.php';
require_once 'utils/database.php';

if (isset($_GET['apply'])) {
    
    $checkEmail = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);
    $checkEmail2 = filter_var($_GET['nouv_email'], FILTER_VALIDATE_EMAIL);
    $checkPass = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_GET['newPassword']);
    $confirmation = $_GET['newPassword'] == $_GET['confirmedPassword'];

    $feedback = '';

    if (
        $checkEmail &&
        $checkEmail2 &&
        $checkPass &&
        uniqueEmail($pdo, $_GET['nouv_email']) &&
        oldEmail($pdo,isset($_GET['email'])) &&
        oldPassword($pdo,isset($_GET['currentPassword'])) &&
        $confirmation
    ) {
        $newEmail = $_GET['nouv_email'];
        $newPassword = hash('sha256', $_GET['newPassword']);
        updateEmail($pdo,$newEmail);
        updatePassword($pdo,$newPassword);
        $feedback = 'modification réussie';
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<?php
    require_once SITE_ROOT. 'partials/head.php';
   ?>

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
        
            <input class="boite" type="email" id="email" name="email" required placeholder="Em@il actuel">
            
            <?php if (isset($_GET['email']) && $checkEmail) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide</p>
            <?php elseif (!oldEmail($pdo,isset($_GET['email']))): ?>
                <p style="color: red;">Ce n'est pas la bonne adresse mail</p>
            <?php endif ?>
            </br>
            </br>

            <input class="boite" type="email" id="nouv_email" name="nouv_email" required placeholder="Nouvel Em@il">
            
            <?php if (isset($_GET['nouv_email']) && $checkEmail2) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
            <?php elseif(!uniqueEmail($pdo, isset($_GET['nouv_email']))): ?>
                <p style="color: red;">L'email est déjà pris.</p>
            <?php endif ?> 
            </br>

            
                </br>
                <br></br>
                <br></br>
           
            <h2>Gestion du mot de passe :</h2>
        
            <input class="boite" type="password" id="currentPassword" name="currentPassword" required placeholder="Mot de passe actuel"></br>
            
            <?php if (!oldPassword($pdo,isset($_GET['currentPassword']))): ?>
                <p style="color: red;">Ce n'est pas le bon mot de passe</p>
            <?php endif ?>

            </br>
            <input class="boite" type="password" id="newPassword" name="newPassword" required placeholder="Nouveau Mot de passe" ></br>
            
            <?php if (isset($_GET['newPassword']) && $checkPass) : ?>
                <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                </p>
            <?php endif ?>
            </br>
            <input class="boite" type="password" id="confirmedPassword" name="confirmedPassword" required placeholder="Confirmer le nouveau mot de passe" ></br>
            
            <?php if (isset($_GET['confirmedPassword']) && $_GET['newPassword'] !== $_GET['confirmedPassword']) : ?>
                <p style="color: red;">Le mot de passe doit être le même.</p>
            <?php endif ?> 

            </br>
        
        </div>
        </br>
        <input class="appliquer" type="submit" name="apply" value="APPLIQUER" href="main.php">
        <br></br>   
        <br></br>
        <br></br>

    <?php echo($feedback) ?>
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