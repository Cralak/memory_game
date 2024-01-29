<?php
function connectToDbAndPOSTPdo(): PDO
{
    $dbname = 'tgfdp';
    $host = 'localhost';
    $dsn = "mysql:dbname=$dbname;host=$host;charset=utf8";
    $user = 'root';
    $pass = '';
    $driver_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $driver_options);
        return $pdo;
    } catch (PDOException $e) {
        echo 'La connexion à la base de données a échouée.';
    }
}
$pdo = connectToDbAndPOSTPdo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        display: flex;
    }

    .score {
        min-height: 100vh;
        min-width: 10%;
        background-color: red;
    }

    .reste {
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .reste header {
        position: relative;
        min-width: 100vw;
        background-color: green;
        padding: 1%;
        top: 0px;
    }

    .reste footer {
        position: relative;
        min-width: 100vw;
        background-color: green;
        padding: 1%;
        bottom: 0px;
    }

    .reste .contenu {
        margin: 10%;
        color: red;
    }

    .reste .tableau {
        color: blue;
    }
</style>

<body>
    <div class="score">
        <p> vise les étoiles
        </p>
    </div>
    <div class="reste">
        <header>
            <p>bonjour</p>
        </header>

        <div class="contenu">
            <p>nique toi</p>
            <form id="entrer">
                <input type="text" placeholder="recherche" id="search">
                <button id="send_form">SEARCH</button>
            </form>
            <table class="tableau">
                <tr class="titre">
                    <td>Joueur</td>
                    <td>Joueur</td>
                    <td>Joueur</td>
                    <td>Joueur</td>
                    <td>Joueur</td>
                </tr>
                <?php
                $pdoStatment = $pdo->prepare("SELECT player,game,difficulty,game_score,game_date_and_time
                FROM scores
                ORDER BY difficulty DESC;");
                $pdoStatment->execute();
                $scores = $pdoStatment->fetchAll();
                ?>
                <?php foreach ($scores as $score) : ?>
                    <tr class="case">
                        <td><?php echo ($score->player) ?></td>
                        <td><?php echo ($score->game) ?></td>
                        <td><?php echo ($score->difficulty) ?></td>
                        <td><?php echo ($score->game_score) ?></td>
                        <td><?php echo ($score->game_date_and_time) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>

        <footer>
            <p>aurevoir</p>
        </footer>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    let submit = document.getElementById('entrer')
    submit.addEventListener('submit', (e) => {
        e.preventDefault();

        $.ajax({
            url: 'utils/ah.php',
            type: 'post',
            data: {
                search: $('#search').val(),
            },
            success: function(data) {
                console.log('success')
                console.log(data)

            }
        })
    });
</script>

</html>