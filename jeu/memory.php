<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu!</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
</head>
<body class="memory">
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
            </div>
        </div>
    </header>

    <br>
    </br>
    <div class="background">
        <img src="assets/images/background4.jpg">
        <div class="content">
            <form>
        <input class="bouton" type ="submit" value="JOUER">
    </form>
        </div>
    </div>
    <center>
    <table>
        <thead>
          <tr width="100">
            <th colspan="100">GAMEPLAY</th>
          </tr>
        </thead>
        <tbody>
            <tr class="titre">
                <td>Theme KanYe</td>
                <td>Theme Mario Bros</td>
                <td>Theme ???</td>
            </tr>
            <tr class="case">
                <td><form action="jeu1.html"><input class="choix" type="submit" value="FACILE T1"></form></td>
                <td><form action="jeu4.html"><input class="choix" type="submit" value="FACILE T2"></form></td>
                <td><form action="jeu7.html"><input class="choix" type="submit" value="FACILE T3"></form></td>
            </tr>
            <tr class="case">
                <td><form action="jeu2.html"><input class="choix" type="submit" value="NORMAL T1"></form></td>
                <td><form action="jeu5.html"><input class="choix" type="submit" value="NORMAL T2"></form></td>
                <td><form action="jeu8.html"><input class="choix" type="submit" value="NORMAL T3"></form></td>
            </tr>
            <tr class="case">
                <td><form action="jeu3.html"><input class="choix" type="submit" value="DIFFICILE T1"></form></td>
                <td><form action="jeu6.html"><input class="choix" type="submit" value="DIFFICILE T2"></form></td>
                <td><form action="jeu9.html"><input class="choix" type="submit" value="DIFFICILE T3"></form></td>
            </tr>
        </tbody>
    <br></br>
    </table></center>
    <br>
    <br>
    <br>
    <br>
    
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