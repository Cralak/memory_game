<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>
<body>
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
</body>
</html>