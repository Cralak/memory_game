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
            <?php
            $pdo = connectToDbAndGetPdo();
            $pdoStatement = $pdo->prepare("SELECT U.username AS senderName, M.sender_id AS senderId, M.message_date_and_time as dateTime, M.message AS message
          FROM messages AS M
          INNER JOIN users AS U
          ON U.id = M.sender_id
        --   WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY
          ORDER BY M.message_date_and_time DESC");
            $pdoStatement->execute();
            $users = $pdoStatement->fetchAll();
            ?>
            <?php foreach ($users as $user) : ?>
                <?php if ($user->message == ":cat:") {
                    $user->message = '<img class="gif" src="https://media.tenor.com/0g4MU_tLFPgAAAAd/goofy-ahh-cat.gif">';
                } ?>
                <?php if ($user->message == ":sematary:") {
                    $user->message = '<img class ="gif" class="gifs" src="https://i.pinimg.com/originals/e8/ae/5f/e8ae5fa65722ea57cc161dbc8b0fd7b8.gif">';
                } ?>

                <?php if ($user->senderId == $_SESSION['userId']) : ?>
                    <div class="message">
                        <div class="message-sender"><?= $user->senderName ?></div>
                        <div class="test">
                            <div class="message-content"><?= $user->message ?></div>
                        </div>
                        <div class="date"><?= $user->dateTime ?></div>
                    </div>
                <?php else : ?>

                    <div class="message2">
                        <div class="message-sender2"><?= $user->senderName ?></div>
                        <div class="test2">
                            <div class="message-content2"><?= $user->message ?></div>
                        </div>
                        <div class="date2"><?= $user->dateTime ?></div>
                    </div>
                <?php endif; ?>


            <?php endforeach; ?>


        </div>



        <form class="chat-input" method="POST">
            <input type="text" id="message-input" placeholder="Saisissez votre message..." name="message">
            <button id="send-button">Envoyer</button>
        </form>
    </div>
    <!------------------chat------------------>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    // Soumettre nouveau chat

    let message = document.getElementsByClassName('chat-input')[0]
    message.addEventListener('submit', (e) => {
        e.preventDefault();

        $.ajax({
            url: 'utils/envoyerChat.php',
            type: 'post',
            data: {
                message: $('#message-input').val(),
                send: true
            },
            success: function(data) {
                //Récupérer les enregistrements du chat et les ajouter à div avec id=chat-messages
                $('#chat-messages').html(data);
                //Effacer la boîte de dialogue après une soumission réussie
                $('#message-input').val('');
            }
        })
    });
    
    // //Nouveau chat

    // setInterval(function () {
    //     $.ajax({
    //         url: 'utils/obtenirChat.php',
    //         type: 'post',
    //         data: {
    //             get: true
    //         },
    //         success: function(data) {
    //             $('#chat-messages').html(data);
    //         }
    //     })
    // }, 1000);
</script>

</html>