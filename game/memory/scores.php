<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once '../../utils/common.php';
  require_once SITE_ROOT . 'partials/head.php';
  require_once SITE_ROOT . 'utils/database.php';
  connectToDbAndGetPdo();
  ?>
</head>

<body class="scores-table">
  <!------------------header------------------>
  <?php
  require_once SITE_ROOT . 'partials/header.php';
  ?>
  <!------------------header------------------>
  
  <div class="background">
    <img src="../../assets/images/background4.jpg">
    <div class="content">
      <h1 class="titre">TABLEAU DES SCORES</h1>
    </div>
  </div>
  <br></br>
  <!-------------Recherche-------------------->
  <center>
  <div class="search-container">
      <form action="scores.php" method="GET">
          <input type="text" name="q" placeholder="Rechercher...">
          <button type="submit">Rechercher</button>
      </form>
  </div>
  </center>
  <!-------------Recherche-------------------->
  <br>
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
        <?php
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare('SELECT u.username AS username, s.game_score AS game_score, 
            s.difficulty AS difficulty, s.game_date_and_time AS date 
             FROM scores AS s
             INNER JOIN users AS u ON u.id = s.player_id
             INNER JOIN games AS g ON g.id = s.game_id');
        $pdoStatement->execute();
        $scores = $pdoStatement->fetchAll();
        ?>
        <?php foreach ($scores as $score) : ?>
          <tr class="case">
            <td><?php echo $score->username ?></td>
            <td><?php echo $score->game_score ?></td>
            <td><?php echo $score->difficulty ?></td>
            <td><?php echo $score->date ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </center>
  <!--------------Tableau------------------>
  <br></br>
  <br></br>
  <br></br>



  <!------------------chat------------------>
  <?php
  require_once SITE_ROOT . 'partials/chat.php';
  ?>
  <!------------------chat------------------>




  <!------------------footer------------------>
  <?php
  require_once SITE_ROOT . 'partials/footer.php';
  ?>
  <!------------------footer------------------>

</body>

</html>