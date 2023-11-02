<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once '../../utils/common.php';
    require_once SITE_ROOT . 'partials/head.php';
    ?>

</head>

<body class="memory">
    <!------------------header------------------>
    <?php
    require_once SITE_ROOT . 'partials/header.php';
    ?>
    <!------------------header------------------>

    <div class="selector" id="selector">
        <br>
        </br>
        <div class="background">
            <img src="../../assets/images/background4.jpg">
            <div class="content">
                <h1>JEU</h1>
            </div>
        </div>
        <h2 class="titre">PERSONNALISATION</h2>
        <div class="personnalisation">
            <div class="theme">
                <p>Thèmes</p>
                <select name="theme" id="theme">
                    <option id="1" value="Theme 1">Theme 1</option>
                    <option id="2" value="Theme 2">Theme 2</option>
                    <option id="3" value="Theme 2">Theme 3</option>
                </select>
            </div>

            <div class="difficulty">
                <p>Difficultés</p>
                <select name="difficulty" id="difficulty">
                    <option id="0" value="Facile">Facile</option>
                    <option id="1" value="Normal">Normal</option>
                    <option id="2" value="Difficile">Difficile</option>
                </select>
            </div>

            <input type="button" class="bouton" value="JOUER" onclick="getDifTheme()">
        </div>
    </div>
    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>
    <!------------------footer------------------>
    <script src="../../assets/js/scripts.js">
    </script>
</body>
</html>