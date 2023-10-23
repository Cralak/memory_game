<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main.css">

    
</head>
<body class="login">

    <!------------------header------------------>

    <header class="header">
        <div class="menus">
            <div>
                <span class="menu1">The Power Of Memory</span>
            </div>
            <div class="menus1">
                <a href="main.html" class="headerspans"><span>ACCUEIL</span></a>
                <a href="login.html" class="headerspans"><span>JEU</span></a>
                <a href="scores.html" class="headerspans"><span>SCORES</span></a>
                <a href="contact.html" class="headerspans"><span>NOUS CONTACTER</span></a>
                <a href="myAccount.html" class="headerspans"><span>MON PROFIL</span></a>

            </div>
        </div>
    </header>
    <!------------------header------------------>


    <div class="background">
        <img src="assets/images/background4.jpg">
        <div class="content">
            <h1>CONNEXION</h1>
        </div>
    </div>
    <br></br>
    <br></br>    
    <form method="POST" action="memory.html">
        <div class="box1">
            <input class="boite" type="email" id="email" name="email" required placeholder="E mail" >
            </br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe" >
            </br>
            </br>
            <input class="connexion" type="submit" value="CONNEXION">
            </br>
            </br>
            <span>Vous n'avez pas de compte ? Inscrivez vous <a href="register.html">ici</a></span>   
        </div>
        <br></br>
        <br></br>
    </form>
    <br>
    </br>
    <br>
    </br>
    <br>
    </br>
    <!------------------chat------------------>

    <div class="chat-container">
        <div class="chat-header">
            Chat en direct
        </div>
        <div class="chat-messages">
        <!-- Ajoutez d'autres messages ici -->
            <div class="message">
                <div class="message-sender">Utilisateur 1</div>
                <div class="test">
                    <div class="message-content">Salut ! Comment ça va ?</div>
                </div>
                <div class="date">Aujourd'hui à 15H30</div>
            </div>
            <div class="message2">
                <div class="message-sender2">Utilisateur 2</div>
                <div class="message-content2">Ça va bien, merci ! Et toi ?</div>
                <div class="date2">Aujourd'hui à 15H32</div>
            </div>
            <div class="message">
                <div class="message-sender">Utilisateur 1</div>
                <div class="test">
                    <div class="message-content">ça va ?</div>
                </div>
                <div class="date">Aujourd'hui à 15H37</div>
            </div>
            <div class="message2">
                <div class="message-sender2">Utilisateur 2</div>
                <div class="message-content2">Et toi ?</div>
                <div class="date2">Aujourd'hui à 15H39</div>
            </div>
        <!-- Ajoutez d'autres messages ici -->
        </div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Saisissez votre message...">
            <button id="send-button">Envoyer</button>
        </div>
    </div>
    <!------------------chat------------------>




    <!------------------footer------------------>
    <footer class="footer">
        <div class="div">
            <h3>Information</h3>
            <p>Quisque commodo facilisis purus,interdum volutpat arcu viverra sed.</p>
            <p><span class="orange">Tel :</span> 06 05 04 03 02</p>
            <p><span class="orange">Em@il :</span> support@powerofmemory.com</p>
            <p><span class="orange">Location :</span> Paris</p>
            <br>
            <a class="logo" href="https://www.facebook.com/?locale=fr_FR"><img src="assets/images/facebook.png"></a>
            <a class="logo" href="https://twitter.com/?lang=fr"><img src="assets/images/twitter.png"></a>
            <a class="logo" href="https://www.pinterest.fr/"><img src="assets/images/pinterest.png"></a>
            <a class="logo" href="https://www.instagram.com/"><img src="assets/images/instagram.png"></a>
            <br><br>

        </div>
        <div class="div">
            <h3>Power of Memory</h3>
            <ul class="liste">
                <li><a href="main.html" class="headerspans"><span>Jouer !</span></a>
                </li>
                <br>
                <li><a href="main.html" class="headerspans"><span>Les scores</span></a>
                </li>
                <br>
                <li><a href="main.html" class="headerspans"><span>Nous contacter</span></a>
                </li>
            </ul>
            <div class="cases"></div>
        </div>
    </footer>
    <!------------------footer------------------>


</body>
</html>