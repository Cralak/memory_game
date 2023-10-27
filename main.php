<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'utils/common.php';
    require_once SITE_ROOT . 'partials/head.php';
    require_once SITE_ROOT . 'utils/database.php';
    connectToDbAndPOSTPdo();
    ?>
</head>

<body class="index">

    <?php
    require_once SITE_ROOT . 'partials/header.php';
    ?>

    <div class="main">
        <img class="img1" src="https://i.redd.it/0gqxu3s861aa1.gif">
        <div>
            <span class="maintext1">BIENVENUE DANS</span>
            <span class="maintext2">NOTRE STUDIO</span>
            <p class="maintext3">Venez challenger les cerveaux les plus agiles !</p>

            <?php
                $link = isset($_SESSION['userId']) ? "game/memory/memory.php" : "login.php";
            ?>
            <a href="<?= PROJECT_FOLDER . $link ?>"><button class="button-play">JOUER !</button></a>
        </div>
    </div>

    <div class="menu1">
        <div class="img2"></div>
        <div class="img3"></div>
        <div class="img4"></div>
    </div>

    <div class="text1">
        <div class="text2">
            <h1 class="color1">01</h1>
            <div>
                <h2>Sematary</h2>
                <span class="textdefinition">
                    Flamethrower a pig, bitch, it's fucking bacon time
                    Knife shine bright while the blood moon smiles
                    Left them by the Haunted Mound, where you buried your dog
                    I'm taking Nazi scalps
                    My soul to take, take you to my slaughter house
                    Wire bat hit ya till your brain fall out
                    I'm dancin' all around just like I'm Bubba
                </span>
            </div>
        </div>
        <div class="text2">
            <h1 class="color1">02</h1>
            <div>
                <h2>The Beast</h2>
                <span class="textdefinition">
                    Beneath the blood moon, the Beast awakens. Born of cosmic chaos, its form eludes comprehension. It hungers for forbidden knowledge, stealing minds from starry dreamers. Its name whispered in dread, a spectral terror that haunts the vast celestial abyss.
                </span>
            </div>
        </div>
        <div class="text2">
            <h1 class="color1">03</h1>
            <div>
                <h2>Jack</h2>
                <span class="textdefinition">
                    Amidst the lush, sensual embrace of the forest, a virile lumberjack named Jack surrendered to the seductive sway of the trees. With his powerful hands and glistening sweat, he awakened a primal connection with the wild, making every swing of his axe a passionate, rhythmic dance.
                </span>
            </div>
        </div>
    </div>

    <div class="menu2">
        <div class="img5">
            <img src="https://i0.wp.com/coopwb.in/wp-content/uploads/2024/07/who-is-sam-hyde-20231007132911.jpg">
        </div>
        <div class="block1">
            <div class="block2">
                <div class="colorbox1">
                    <span class="block3-span1">
                        <?php
                            $pdo = connectToDbAndPOSTPdo();
                            $pdoStatement = $pdo->prepare('SELECT COUNT(*) AS gameCount FROM games');
                            $pdoStatement->execute();
                            $games = $pdoStatement->fetch();
                            echo $games->gameCount;
                        ?>
                    </span>
                    <span class="block3-span2">Jeux</span>
                </div>
                <div class="colorbox2">
                    <span class="block3-span1">66</span>
                    <span class="block3-span2">Fractures crâniennes</span>
                </div>
            </div>
            <div class="block2">
                <div class="colorbox3">
                    <span class="block3-span1">
                        <?php
                            $pdo = connectToDbAndPOSTPdo();
                            $pdoStatement = $pdo->prepare('SELECT COUNT(*) AS usersCount FROM users');
                            $pdoStatement->execute();
                            $users = $pdoStatement->fetch();
                            echo $users->usersCount;
                        ?>
                    </span>
                    <span class="block3-span2">Utilisateurs déportés</span>
                </div>
                <div class="colorbox4">
                    <span class="block3-span1">456 059</span>
                    <span class="block3-span2">Mères célibataire maltraitées</span>
                </div>
            </div>
        </div>
    </div>

    <div>
        <span class="notre-equipe">Notre Équipe</span>
        <span class="notre-equipe-subtext">cest nous regardez nous, on est la avec les images</span>
    </div>

    <div class="teams-parent">
        <div class="teams">
            <img src="https://i1.sndcdn.com/artworks-TuSwtymuCzpnAP9r-9myiwQ-t500x500.jpg">
            <span class="members">ЭЛЕКТРИФИКАЦИЯ</span>
            <p class="color2">Дев Голем Делюкс</p>
            <div class="icons">
                <a class="instagram1" href="https://www.instagram.com/pixellefanclub/?hl=en"></a>
                <a class="twitter1" href="https://www.instagram.com/pixellefanclub/?hl=en"></a>
                <a class="pinterest1" href="https://www.instagram.com/pixellefanclub/?hl=en"></a>
            </div>
        </div>
        <div class="teams">
            <img src="https://images.mubicdn.net/images/cast_member/532823/cache-439343-1559022206/image-w856.jpg">
            <span class="members">JAMES</span>
            <p class="color2">Goofy Goobers Manager</p>
            <div class="icons">
                <a class="instagram2" href="https://www.instagram.com/joebiden/?hl=en"></a>
                <a class="twitter2" href="https://www.instagram.com/joebiden/?hl=en"></a>
                <a class="pinterest2" href="https://www.instagram.com/joebiden/?hl=en"></a>
            </div>
        </div>
        <div class="teams">
            <img src="https://pbs.twimg.com/media/FmiWkUqX0AEd-z-.png">
            <span class="members">SUSGUY</span>
            <p class="color2">Bodyguard and Idea Manager</p>
            <div class="icons">
                <a class="instagram3" href="https://www.instagram.com/semataryy/?hl=en"></a>
                <a class="twitter3" href="https://www.instagram.com/semataryy/?hl=en"></a>
                <a class="pinterest3" href="https://www.instagram.com/semataryy/?hl=en"></a>
            </div>
        </div>
    </div>
    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>

</body>

</html>