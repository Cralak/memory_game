<!DOCTYPE html>
<html lang="fr">
<head>
<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
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
    <form class="box" method="POST" action="traitement.php">
        <div>
            <h2>Gestion de l'Email :</h2>
        
            <input class="boite" type="text" id="nom" name="nom" required placeholder="Em@il actuel" ></br>
            </br>
            <input class="boite" type="email" id="email" name="email" required placeholder="Nouvel Em@il" ></br>
                </br>
                <br></br>
                <br></br>
           
            <h2>Gestion du mot de passe :</h2>
        
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Mot de passe actuel" ></br>
                </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Nouveau Mot de passe" ></br>
            </br>
            <input class="boite" type="password" id="motDePasse" name="motDePasse" required placeholder="Confirmer le nouveau mot de passe" ></br>
            </br>
        
        </div>
        </br>
        <input class="appliquer" type="submit" value="APPLIQUER" href="main.php">
        <br></br>   
        <br></br>
        <br></br>
    </form>
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