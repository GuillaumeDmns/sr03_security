<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Clients</title>
  <link rel="stylesheet" type="text/css" media="all"  href="/sr03_security/public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Liste clients</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo $_SESSION["connected_user"]["prenom"];?> <?php echo $_SESSION["connected_user"]["nom"];?></h2>
      </header>
      <div class="liste">
          <table>
            <?php
            foreach ($users as $key => $user) {
              echo '<tr>';
              echo '<td>'.$user['nom'].'</td>';
              echo '<td>'.$user['prenom'].'</td>';
              echo '<td>'.$user['numero_compte'].'</td>';
              echo '<td><a href="http://localhost/sr03_security/?action=clients&user='.$user['login'].'">Voir</a></td>';
              echo '</tr>';
            }

             ?>
          </table>
      </div>
      <?php if (isset($_GET['user']) && $_GET['user'] !== '') { 
        $user = $users[$_GET['user']];
      ?>
      <div class="form">
        <form method="POST" action="http://localhost/sr03_security/?action=virement">
          <?php echo "Faire un virement à " . $user['prenom'] . " " . $user['nom']; ?><br /><br />
          <input type="hidden" name="id_user" value="<?php $user['id_user'] ?>">
          <input type="text" name="montant" />
          <button>Envoyer</button>
        </form>
      </div>
      <?php } ?>
      <div class="form">
        <form method="GET">
          <input type="hidden" name="action" value="home">
          <button>Accueil</button>
        </form>
      </div>
    </article>
  </main>
</body>
</html>
