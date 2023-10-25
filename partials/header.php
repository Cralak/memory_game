<?php $page = basename($_SERVER['PHP_SELF']);
require_once SITE_ROOT . 'partials/head.php';
require_once SITE_ROOT . 'utils/database.php';
?>


<body>
    <!------------------header------------------>
    <header class="header">
        <div class="menus">
            <div>
                <span class="menu1">The Power Of Memory</span>
            </div>

            <?php
                if (isset($_SESSION['userId'])) {
                    $pdo = connectToDbAndGetPdo();
                    $pdoStatement = $pdo->prepare('SELECT username FROM users WHERE id = :userId');
                    $pdoStatement->execute([":userId" => $_SESSION['userId']]);
                    $user = $pdoStatement->fetch();
                    $text = $user->username;
                    $link = "myAccount.php";
                    $gameLink = "game/memory/memory.php";
                } else {
                    $text = "SE CONNECTER";
                    $link = "login.php";
                    $gameLink = "login.php";
                }
                ?>

            <div class="menus1">
                <a href="<?= PROJECT_FOLDER ?>main.php" class="headerspans <?php if ($page == 'main.php') {
                                                                                echo 'active';
                                                                            } ?>"><span>ACCUEIL</span></a>

                <a href="<?= PROJECT_FOLDER . $gameLink ?>" class="headerspans <?php if ($page == 'memory.php') {
                                                                                                echo 'active';
                                                                                            } ?>"><span>JEU</span></a>

                <a href="<?= PROJECT_FOLDER ?>game/memory/scores.php" class="headerspans <?php if ($page == 'scores.php') {
                                                                                                echo 'active';
                                                                                            } ?>"><span>SCORES</span></a>

                <a href="<?= PROJECT_FOLDER ?>contact.php" class="headerspans <?php if ($page == 'contact.php') {
                                                                                    echo 'active';
                                                                                } ?>"><span>NOUS CONTACTER</span></a>
                
                <a href="<?= PROJECT_FOLDER . $link ?>" class="headerspans <?php if ($page == 'myAccount.php') {
                                                                                echo 'active';
                                                                            } ?>"><span><?= $text ?>

                    </span>
                </a>
            </div>
        </div>
    </header>
    <!------------------header------------------>
</body>

</html>