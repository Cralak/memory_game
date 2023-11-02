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
        header("location:login.php");
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
            <div>
                <input class="boite" type="text" id="nom" name="nom" placeholder="Nom" required value="<?php echo isset($_GET['nom']) ? $_GET['nom'] : ''; ?>"></br>
                <?php if (isset($_GET['nom']) && !$isNameLengthIsOk) :  ?>
                    <p style="color: red;">Le pseudo doit avoir au moins 4 caractères.</p>
                <?php elseif (isset($_GET['nom']) && uniquePseudo($pdo, $_GET['nom']) == 1) : ?>
                    <p style="color: red;">Le pseudo est déjà utilisé.</p>
                <?php endif ?>
                </br>
            </div>
            <div>
                <input class="boite" type="email" id="email" name="email" placeholder="E mail" required value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>"></br>
                <?php if (isset($_GET['email']) && !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) : ?>
                    <p style="color: red;">L'adresse e-mail n'est pas valide.</p>
                <?php elseif (isset($_GET['email']) && uniqueEmail($pdo, $_GET['email']) == 1) : ?>
                    <p style="color: red;">L'adresse e-mail est déjà utilisée.</p>
                <?php endif ?>
                </br>
            </div>
            <div id="passwordInput">
                <input class="boite" type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe" required value="<?php echo isset($_GET['motDePasse']) ? $_GET['motDePasse'] : ''; ?>"></br>
                <?php if (isset($_GET['motDePasse']) && !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/', $_GET['motDePasse'])) : ?>
                    <p style="color: red;">Le mot de passe doit : <br> Comprendre au minimum 8 caractères <br>Comprendre au moins un chiffre <br>Comprendre au moins une majuscule <br>Comprendre au moins un caractère spécial.
                    </p>
                <?php endif ?>
            </div>

            <div id="passwordStrength">
                <span id="poor"></span>
                <span id="weak"></span>
                <span id="strong"></span>
            </div>
            <div id="passwordInfo"></div>
            </br>
            <div>
                <input class="boite" type="password" id="confirmationMotDePasse" name="confirmationMotDePasse" placeholder="Confirmer le mot de passe" required value="<?php echo isset($_GET['confirmationMotDePasse']) ? $_GET['confirmationMotDePasse'] : ''; ?>"></br>
                <?php if (isset($_GET['confirmationMotDePasse']) && $_GET['motDePasse'] !== $_GET['confirmationMotDePasse']) : ?>
                    <p style="color: red;">Le mot de passe doit être le même.</p>
                <?php endif ?>
                </br>
            </div>


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

<script>
    let passwordInput = document.querySelector('#passwordInput input[type="password"]');
    let passwordStrength = document.getElementById('passwordStrength');
    let poor = document.querySelector('#passwordStrength #poor');
    let weak = document.querySelector('#passwordStrength #weak');
    let strong = document.querySelector('#passwordStrength #strong');
    let passwordInfo = document.getElementById('passwordInfo');

    let poorRegExp = /[a-z]/;
    let weakRegExp = /(?=.*?[0-9])/;;
    let strongRegExp = /(?=.*?[#?!@$%^&*-])/;
    let whitespaceRegExp = /^$|\s+/;
    passwordInput.oninput = function() {

        let passwordValue = passwordInput.value;
        let passwordLength = passwordValue.length;
        let poorPassword = passwordValue.match(poorRegExp);
        let weakPassword = passwordValue.match(weakRegExp);
        let strongPassword = passwordValue.match(strongRegExp);
        let whitespace = passwordValue.match(whitespaceRegExp);
        if (passwordValue != "") {
            passwordStrength.style.display = "block";
            passwordStrength.style.display = "flex";
            passwordInfo.style.display = "block";
            passwordInfo.style.color = "red";
            if (whitespace) {
                passwordInfo.textContent = "Les espaces ne sont pas tolérer";
            } else {
                poorPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
                weakPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
                strongPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword);
            }

        } else {

            passwordStrength.style.display = "none";
            passwordInfo.style.display = "none";

        }
    }

    function poorPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {
        if (passwordLength <= 3 && (poorPassword || weakPassword || strongPassword)) {
            poor.classList.add("active");
            passwordInfo.style.display = "block";
            passwordInfo.style.color = "red";
            passwordInfo.textContent = "Your password is too Poor";

        }
    }

    function weakPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {
        if (passwordLength >= 4 && poorPassword && (weakPassword || strongPassword)) {
            weak.classList.add("active");
            passwordInfo.style.color = "orange";
            passwordInfo.textContent = "Your password is Weak";


        } else {
            weak.classList.remove("active");

        }
    }

    function strongPasswordStrength(passwordLength, poorPassword, weakPassword, strongPassword) {
        if (passwordLength >= 6 && (poorPassword && weakPassword) && strongPassword) {
            poor.classList.add("active");
            weak.classList.add("active");
            strong.classList.add("active");
            passwordInfo.textContent = "Your password is strong";
            passwordInfo.style.color = "green";
        } else {
            strong.classList.remove("active");

        }
    }
</script>

</html>