<?php
require_once 'utils/common.php';
require_once 'utils/database.php';

if (isset($_GET['register'])) {
    
    $isNameLengthIsOk = preg_match('/.{4,}$/', $_GET['nom']);
    $checkEmail = filter_var($_GET['email'], FILTER_VALIDATE_EMAIL);
    $checkPass = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_GET['motDePasse']);
    $feedback = '';

    if (
        $isNameLengthIsOk &&
        $checkEmail &&
        $checkPass &&
        uniquePseudo($pdo, $_GET['nom']) &&
        uniqueEmail($pdo, $_GET['email']) &&
        $_GET['motDePasse'] == $_GET['confirmationMotDePasse']
    ) {
        $motDePasse = hash('sha256', $_GET['motDePasse']);
        insertusers($pdo, $_GET['nom'], $_GET['email'], $motDePasse);
        $feedback = 'inscription réussie';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php require_once SITE_ROOT . 'partials/head.php'; ?>

<body class="login">
    <!------------------header------------------>
    <?php require_once SITE_ROOT . 'partials/header.php'; ?>
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
    <form method="GET">
        <div class="box1">
            <input class="boite" type="text" id="nom" name="nom" placeholder="Nom" required value="<?php echo isset($_GET['nom']) ? $_GET['nom'] : ''; ?>"></br>
            
            <?php if (isset($_GET['nom']) && !$isNameLengthIsOk) :  ?>
                <p style="color: red;">Le pseudo doit avoir au moins 4 caractères.</p>
            <?php elseif(uniquePseudo($pdo, isset($_GET['nom']))): ?>
                <p style="color: red;">Le pseudo est déjà pris.</p>
            <?php endif ?>
            </br>

            <input class="boite" type="email" id="email" name="email" placeholder="E mail" required value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>"></br>
            
            <?php if (isset($_GET['email']) && !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
            <?php elseif(uniqueEmail($pdo, isset($_GET['email']))): ?>
                <p style="color: red;">L'email est déjà pris.</p>
            <?php endif ?>
            </br>

            <input class="boite" type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe" required value="<?php echo isset($_GET['motDePasse']) ? $_GET['motDePasse'] : ''; ?>"></br>
            
            <?php if (isset($_GET['motDePasse']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_GET['motDePasse'])) : ?>
                <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                </p>
            <?php endif ?>
            </br>

            <input class="boite" type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" placeholder="Confirmer le mot de passe" required  value="<?php echo isset($_GET['confirmationMotDePasse']) ? $_GET['confirmationMotDePasse'] : ''; ?>"></br>
            
            <?php if (isset($_GET['confirmationMotDePasse']) && $_GET['motDePasse'] !== $_GET['confirmationMotDePasse']) : ?>
                <p style="color: red;">Le mot de passe doit être le même.</p>
            <?php endif ?>            
            </br>

            <input class="connexion" type="submit" value="S'INSCRIRE" name="register" href="main.php">
            </br>
            </br>
            <span>Vous avez déjà un compte ? Connectez vous <a href="login.php">ici</a></span>
            <br>
            </br>
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

    <?php echo $feedback ?>

    <!------------------footer------------------>
    <?php require_once SITE_ROOT . 'partials/footer.php'; ?>
    <!------------------footer------------------>
</body>

</html>