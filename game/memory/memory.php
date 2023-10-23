<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require_once '../../utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
<body class="memory">
    <!------------------header------------------>
  <?php
    require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>

    <br>
    </br>
    <center>
    <div class="background">
        <img src="../../assets/images/background4.jpg">
        <div class="content">
            <form>
        <input class="bouton" type ="submit" value="JOUER">
    </form>
        </div>
    </div>
</center>
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
                <td><form action="jeu1.php"><input class="choix" type="submit" value="FACILE T1"></form></td>
                <td><form action="jeu4.php"><input class="choix" type="submit" value="FACILE T2"></form></td>
                <td><form action="jeu7.php"><input class="choix" type="submit" value="FACILE T3"></form></td>
            </tr>
            <tr class="case">
                <td><form action="jeu2.php"><input class="choix" type="submit" value="NORMAL T1"></form></td>
                <td><form action="jeu5.php"><input class="choix" type="submit" value="NORMAL T2"></form></td>
                <td><form action="jeu8.php"><input class="choix" type="submit" value="NORMAL T3"></form></td>
            </tr>
            <tr class="case">
                <td><form action="jeu3.php"><input class="choix" type="submit" value="DIFFICILE T1"></form></td>
                <td><form action="jeu6.php"><input class="choix" type="submit" value="DIFFICILE T2"></form></td>
                <td><form action="jeu9.php"><input class="choix" type="submit" value="DIFFICILE T3"></form></td>
            </tr>
        </tbody>
    <br></br>
    </table></center>
    <br>
    <br>
    <br>
    <br>

    <!------------------chat------------------>
  <?php
    require_once SITE_ROOT. 'partials/chat.php';
    ?>
    <!------------------chat------------------>


    
    
    <!------------------header------------------>
  <?php
    require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>
</body>
</html>