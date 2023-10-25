

<?php $page = basename($_SERVER['PHP_SELF']);
?>


<body>
    <!------------------header------------------>
    <header class="header">
        <div class="menus">
            <div>
                <span class="menu1">The Power Of Memory</span>
            </div>
            <div class="menus1">

            <a href="<?= PROJECT_FOLDER ?>main.php" class="headerspans <?php if ($page == 'main.php') {echo 'active';} ?>"><span>ACCUEIL</span></a>

            <a href="<?= PROJECT_FOLDER ?>game/memory/memory.php" class="headerspans <?php if ($page == 'memory.php') {echo 'active';} ?>"><span>JEU</span></a>

            <a href="<?= PROJECT_FOLDER ?>game/memory/scores.php" class="headerspans <?php if ($page == 'scores.php') {echo 'active';} ?>"><span>SCORES</span></a>

            <a href="<?= PROJECT_FOLDER ?>contact.php" class="headerspans <?php if ($page == 'contact.php') {echo 'active';} ?>"><span>NOUS CONTACTER</span></a>

            <a href="<?= PROJECT_FOLDER ?>myAccount.php" class="headerspans <?php if ($page == 'myAccount.php') {echo 'active';} ?>"><span>MON PROFIL</span></a>

            </div>
        </div>
    </header>
    <!------------------header------------------>
</body>
</html>