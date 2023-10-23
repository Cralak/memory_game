<!DOCTYPE html>
<html lang="en">
<head>
<?php
    require_once 'utils/common.php'; 
    require_once SITE_ROOT. 'partials/head.php';
   ?>

</head>
<body class="scores-table">
  <!------------------header------------------>
  <?php
    require_once SITE_ROOT. 'partials/header.php';
    ?>
    <!------------------header------------------>

  <div class="background">
      <img src="assets/images/background4.jpg">
      <div class="content">
          <h1 class="titre">TABLEAU DES SCORES</h1>
      </div>
    </div>
    <br></br>
    <!--------------Tableau------------------>
    <center>
    <table class="scores-table">
        <thead>
          <tr width="100">
            <th colspan="100">SCORES</th>
          </tr>
        </thead>
        <tbody>
          <tr class="titre">
            <td>PSEUDO</td>
            
            <td>POINTS</td>
            <td>DIFFCULTY</td>
            <TD>DERNIERE PARTIE JOUER</TD>
          </tr>
          <tr class="case">
            <td>kk</td>
            <td>1000000</td>
            <td>EXTREME</td>
            <td>demain. 15h64</td>
          </tr>
          <tr class="case">
            <td>kk</td>
            <td>1000000</td>
            <td>EXTREME</td>
            <td>demain. 15h64</td>
          </tr>
          <tr class="case">
            <td>kk</td>
            <td>1000000</td>
            <td>EXTREME</td>
            <td>demain. 15h64</td>
          </tr>
        </tbody>
      </table>
    </center>
    <!--------------Tableau------------------>
    <br></br>
    <br></br>
    <br></br>



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