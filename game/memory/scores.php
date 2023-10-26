<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once '../../utils/common.php';
  require_once SITE_ROOT . 'partials/head.php';
  require_once SITE_ROOT . 'utils/database.php';
  connectToDbAndPOSTPdo();
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
      <form action="scores.php" method="POST">
        <input name="search" type="text" placeholder="Rechercher...">
        <input type="submit" value="Search">
      </form>
    </div>
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
          $pdo = connectToDbAndPOSTPdo();
          $searchValue = isset($_POST['search']) ? $_POST['search'] : "";
          $pdoStatement = $pdo->prepare("SELECT u.username AS username, s.game_score AS game_score, 
            s.difficulty AS difficulty, s.game_date_and_time AS game_date
             FROM scores AS s
             INNER JOIN users AS u ON u.id = s.player_id
             INNER JOIN games AS g ON g.id = s.game_id
             WHERE (u.username LIKE '%$searchValue%') OR (s.difficulty LIKE '%$searchValue%') OR (s.game_score LIKE '%$searchValue%') OR (s.game_date_and_time LIKE '%$searchValue%')
             ORDER BY difficulty");
          $pdoStatement->execute();
          $scores = $pdoStatement->fetchAll();
          ?>
          <?php foreach ($scores as $score) : ?>
            <tr class="case">
              <td><?php echo $score->username ?></td>
              <td><?php echo $score->game_score ?></td>
              <td><?php echo $score->difficulty ?></td>
              <td><?php echo $score->game_date ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </center>
    <!--------------Tableau------------------>
    <br></br>
    <br></br>
    <br></br>


    <!------------------footer------------------>
    <?php
    require_once SITE_ROOT . 'partials/footer.php';
    ?>
    <!------------------footer------------------>

</body>

</html>