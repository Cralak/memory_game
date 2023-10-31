<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once '../../utils/common.php';
    require_once SITE_ROOT . 'partials/head.php';
    ?>

</head>

<body class="memory">
    <!------------------header------------------>
    <?php
    require_once SITE_ROOT . 'partials/header.php';
    ?>
    <!------------------header------------------>

    <br>
    </br>
    <div class="background">
        <img src="../../assets/images/background4.jpg">
        <div class="content">
            <form>
                <h1 style="font: size 70px;">JEU</h1>
            </form>
        </div>
    </div>
        <div class="personnalisation">
        <h2>Personnalisation</h2>
            <div class="theme">
            <p>Thèmes</p>
            <select name="theme" id="theme">
                <option value="Theme 1">Theme 1</option>
                <option value="Theme 2">Theme 2</option>
                <option value="Theme 2">Theme 3</option>
            </select>
            <div class="difficulty">
            <p>Difficultés</p>
            <select name="theme" id="theme">
                <option value="Facile">Facile</option>
                <option value="Normal">Normal</option>
                <option value="Difficile">Difficile</option>
            </select>
            </div>

            <input type="button" id="jouer" value="JOUER" onclick="creatMemory()">
        </div>
    <br>
    <br>
    <br>
    <br>

    <div class="time">
        <p id="timer">00:00:00</p>
        <button id="startButton">Démarrer</button>
        <button id="stopButton">Arrêter</button>
        <button id="resetButton">Réinitialiser</button>
    </div>


    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>
    <!------------------footer------------------>



    <script>
        let timerInterval;
        let seconds = 0;
        let minutes = 0;
        let hours = 0;

        function startTimer() {
            document.getElementById("startButton").disabled = true;
            document.getElementById("stopButton").disabled = false;
            document.getElementById("resetButton").disabled = true;
            timerInterval = setInterval(updateTimer, 1000);
        }

        function stopTimer() {
            document.getElementById("startButton").disabled = false;
            document.getElementById("stopButton").disabled = true;
            document.getElementById("resetButton").disabled = false;
            clearInterval(timerInterval);
        }

        function resetTimer() {
            document.getElementById("startButton").disabled = false;
            document.getElementById("stopButton").disabled = true;
            document.getElementById("resetButton").disabled = true;
            clearInterval(timerInterval);
            seconds = 0;
            minutes = 0;
            hours = 0;
            updateTimer();
        }

        function updateTimer() {
            seconds++;
            if (seconds === 60) {
                seconds = 0;
                minutes++;
                if (minutes === 60) {
                    minutes = 0;
                    hours++;
                }
            }

            const timeString = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            document.getElementById("timer").textContent = timeString;
        }

        document.getElementById("startButton").addEventListener("click", startTimer);
        document.getElementById("stopButton").addEventListener("click", stopTimer);
        document.getElementById("resetButton").addEventListener("click", resetTimer);




        
        creatMemory()
    </script>
</body>

</html>