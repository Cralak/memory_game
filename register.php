<?php
require_once 'utils/common.php';
require_once 'utils/database.php';

if (isset($_POST['register'])) {

    $isNameLengthIsOk = preg_match('/.{4,}$/', $_POST['nom']);
    $checkEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $checkPass = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['motDePasse']);
    $feedback = '';

    if (
        $isNameLengthIsOk &&
        $checkEmail &&
        $checkPass &&
        uniquePseudo($pdo, $_POST['nom']) &&
        uniqueEmail($pdo, $_POST['email']) &&
        $_POST['motDePasse'] == $_POST['confirmationMotDePasse']
    ) {
        $motDePasse = hash('sha256', $_POST['motDePasse']);
        insertusers($pdo, $_POST['nom'], $_POST['email'], $motDePasse);
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
    <form method="POST">
        <div class="box1">
            <input class="boite" type="text" id="nom" name="nom" placeholder="Nom" required value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>"></br>
            <?php if (isset($_POST['nom']) && !$isNameLengthIsOk) :  ?>
                <p style="color: red;">Le pseudo doit avoir au moins 4 caractères.</p>
            <?php endif ?>
            </br>

            <input class="boite" type="email" id="email" name="email" placeholder="E mail" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"></br>
            <?php if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) : ?>
                <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
            <?php endif ?>
            </br>

            <input class="boite" type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe" required value="<?php echo isset($_POST['motDePasse']) ? $_POST['motDePasse'] : ''; ?>"></br>
            <?php if (isset($_POST['motDePasse']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_POST['motDePasse'])) : ?>
                <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                </p>
            <?php endif ?>
            </br>

            <input class="boite" type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" placeholder="Confirmer le mot de passe" required value="<?php echo isset($_POST['confirmationMotDePasse']) ? $_POST['confirmationMotDePasse'] : ''; ?>"></br>
            <?php if (isset($_POST['confirmationMotDePasse']) && $_POST['motDePasse'] !== $_POST['confirmationMotDePasse']) : ?>
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