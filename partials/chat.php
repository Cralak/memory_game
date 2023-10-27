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
                <?php if($user->message == ":cat:"){
                    $user->message = '<img class="gif" src="https://media.tenor.com/0g4MU_tLFPgAAAAd/goofy-ahh-cat.gif">';
                        // $catUrl = 'https://api.thecatapi.com/v1/images/search?mime_types=gif';
                        // $content = file_get_contents($catUrl);
                        // $cats = json_decode($content);
                        // var_dump($cats);
                    } ?>
                <?php if($user->message == ":sematary:"){$user->message = '<img class ="gif" class="gifs" src="https://i.pinimg.com/originals/e8/ae/5f/e8ae5fa65722ea57cc161dbc8b0fd7b8.gif">';} ?>

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

        <?php
        if (isset($_POST['message'])) {
            $pdo = connectToDbAndGetPdo();
            $pdoStatement = $pdo->prepare("INSERT INTO messages(sender_id, message, game_id, message_date_and_time) 
            VALUES(:id , :content, '1', NOW())");
            $pdoStatement->execute([
                ":id" => $_SESSION['userId'],
                ":content" => $_POST['message'],
            ]);
        }
        ?>

        <form autocomplete="off" class="chat-input" method="POST">
            <input type="text" id="message-input" placeholder="Saisissez votre message..." name="message">
            <button id="send-button">Envoyer</button>
        </form>
    </div>
    <!------------------chat------------------>
</body>

</html>