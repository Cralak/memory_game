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
            $pdo = connectToDbAndPOSTPdo();

            $pdoStatement = $pdo->prepare("SELECT U.username AS senderName, M.sender_id AS senderId, M.message_date_and_time as dateTime, M.message AS message
            FROM messages AS M
            INNER JOIN users AS U
            ON U.id = M.sender_id
            WHERE message_date_and_time >= NOW() - INTERVAL 1 DAY
            ORDER BY M.message_date_and_time ASC");
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



        <form class="chat-input">
            <input type="text" id="message-input" placeholder="Saisissez votre message..." name="message">
            <button id="send-button">Envoyer</button>
        </form>
    </div>
    <!------------------chat------------------>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var $user = '<?= $_SESSION['pseudo'] ?>';
</script>
<script>
    // Soumettre nouveau chat

    let message = document.getElementsByClassName('chat-input')[0]
    message.addEventListener('submit', (e) => {
        e.preventDefault();

        $.ajax({
            url: '../../utils/envoyerChat.php',
            type: 'post',
            data: {
                message: $('#message-input').val(),
            },
            success: function(data) {
                displayMessage($('#message-input').val())
                $('#message-input').val('');
                
            }
        })
    });

    //Nouveau chat

    // setInterval(function() {
    //     $.ajax({
    //         url: '../../utils/obtenirChat.php',
    //         dataType: 'json',
    //         success: function(data) {
    //             scrollChatToBottom();
    //         }
    //     })
    // }, 1000);


    function displayMessage(message) {
        let date = new Date();
        const chatMessages = document.querySelector('.chat-messages');
        console.log('test1')
        const messageElement = document.createElement('div');
        messageElement.classList.add('message');
        messageElement.innerHTML = `
    <div class="message-sender"><?= $_SESSION['userId'] ?></div>
    <div class="test">
    <div class="message-content">${message}</div>
    </div>
    <div class="date"> ${date.getFullYear() + "-" + Math.floor(date.getMonth() + 1) + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()} </div>
  `;

        chatMessages.appendChild(messageElement);
        console.log(messageElement)

    }

    function scrollChatToBottom() {
        const chatMessages = document.querySelector('.chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
</script>

</html>