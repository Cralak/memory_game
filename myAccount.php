<?php
    if(isset($_POST['disconnect'])){
    session_destroy();
    header("location:main.php");
    } 
?>
    
<?php 
require_once 'utils/common.php';
require_once 'utils/database.php';

$feedback = '';
if (isset($_POST['apply'])) {
    
    $checkEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $checkEmail2 = filter_var($_POST['nouv_email'], FILTER_VALIDATE_EMAIL);
    $checkPass = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['newPassword']);
    $confirmation = $_POST['newPassword'] == $_POST['confirmedPassword'];

    if (
        $checkEmail &&
        $checkEmail2 &&
        $checkPass &&
        !uniqueEmail($pdo,$_POST['nouv_email'],$_SESSION['userId'])|| 
        !memeEmail($pdo,$_POST['nouv_email'],$_SESSION['userId']) &&
        oldEmail($pdo,$_POST['email'],$_SESSION['userId']) &&
        oldPassword($pdo,$_POST['currentPassword'],$_SESSION['userId'])
        
    ) {
        $newEmail = $_POST['nouv_email'];
        $newPassword = hash('sha256', $_POST['newPassword']);
        updateEmail($pdo,$newEmail, $_SESSION['userId']);
        updatePassword($pdo,$newPassword,$_SESSION['userId']);
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
    <br></br>    

    <form method="POST">
        <input class="appliquer" type="submit" name="disconnect" value="DÉCONNEXION" >
    </form>

    <br></br>    
    <center><?php echo($feedback) ?></center>

    <form class="box" method="POST">
        <div>
            <h2>Gestion de l'Email :</h2>
        
            <input class="boite" type="text" id="email" name="email" placeholder="Em@il actuel" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            
            <?php if (isset($_POST['email']) && !$checkEmail) : ?>
                <p style="color: red; margin-left: 32.6%;">L'adresse e-mail n'est pas valide</p>
            <?php elseif (isset($_POST['email']) && oldEmail($pdo,$_POST['email'],$_SESSION['userId']) != 1): ?>
                <p style="color: red; margin-left: 32.6%;">Ce n'est pas la bonne adresse mail</p>
            <?php endif ?>
            </br>
            </br>

            <input class="boite" type="text" id="nouv_email" name="nouv_email" placeholder="Nouvel Em@il" required value="<?php echo isset($_POST['nouv_email']) ? $_POST['nouv_email'] : ''; ?>">
            <p style="color: white; margin-left: 32.6%;">Vous pouvez utiliser le meme email.</p>
            <?php if (isset($_POST['nouv_email']) && !$checkEmail2) : ?>
                <p style="color: red; margin-left: 32.6%;">L'adresse e-mail n'est pas valide.</p>

            <?php elseif(isset($_POST['nouv_email']) && memeEmail($pdo,$_POST['nouv_email'],$_SESSION['userId']) != 1): ?>
            <?php elseif (isset($_POST['nouv_email']) && uniqueEmail($pdo,$_POST['nouv_email'],$_SESSION['userId']) == 1): ?>
                    <p style="color: red; margin-left: 32.6%;">L'email est déjà pris par un autre utilisateur.</p>
            <?php endif ?>
            </br>

            
                </br>
                <br></br>
                <br></br>
           
            <h2>Gestion du mot de passe :</h2>
        
            <input class="boite" type="password" id="currentPassword" name="currentPassword" required placeholder="Mot de passe actuel"></br>
            <?php if (isset($_POST['currentPassword']) && oldPassword($pdo,$_POST['currentPassword'],$_SESSION['userId']) != 1): ?>
                <p style="color: red; margin-left: 32.6%;">Ce n'est pas le bon mot de passe</p>
            <?php endif ?>

            </br>
            <input class="boite" type="password" id="newPassword" name="newPassword" required placeholder="Nouveau Mot de passe" ></br>
            
            <p style="color: white; margin-left: 32.6%;">Vous pouvez utiliser le meme mot de passe.</p>
            <?php if (isset($_POST['newPassword']) && !$checkPass) : ?>
                <p style="color: red; margin-left: 32.6%;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                </p>
            <?php endif ?>
            </br>
            <input class="boite" type="password" id="confirmedPassword" name="confirmedPassword" required placeholder="Confirmer le nouveau mot de passe" ></br>
            
            <?php if (isset($_POST['confirmedPassword']) && $_POST['newPassword'] != $_POST['confirmedPassword']) : ?>
                <p style="color: red; margin-left: 32.6%;">Le mot de passe doit être le même.</p>
            <?php endif ?> 

            </br>
        
        </div>
        </br>
        <input class="appliquer" type="submit" name="apply" value="APPLIQUER" href="main.php">
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