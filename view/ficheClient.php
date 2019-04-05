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
        <h2>Bienvenue <?php echo htmlspecialchars($_SESSION["connected_user"]["prenom"]);?> <?php echo htmlspecialchars($_SESSION["connected_user"]["nom"]);?></h2>
        <p>Vous avez <?php echo htmlspecialchars($_SESSION["connected_user"]["solde_compte"]); ?> sur votre compte.</p>
      </header>
      <div class="liste">
          <table>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Numéro de compte</th>
              <?php if ($_SESSION["connected_user"]["profil_user"] == "CONSEILLER") echo '<th>Solde</th>'; ?>
            </tr>
            <?php
            foreach ($users as $key => $user) {
              echo '<tr>';
              echo '<td>'.htmlspecialchars($user['nom']).'</td>';
              echo '<td>'.htmlspecialchars($user['prenom']).'</td>';
              echo '<td>'.htmlspecialchars($user['numero_compte']).'</td>';
              if ($_SESSION["connected_user"]["profil_user"] == "CONSEILLER") {
                echo '<td>'.$user['solde_compte'].'</td>';
              }
              echo '<td><a href="http://localhost/sr03_security/?action=clients&user='.$user['login'].'">Virement</a></td>';
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
          <?php echo "Faire un virement à " . htmlspecialchars($user['prenom']) . " " . htmlspecialchars($user['nom']); ?><br /><br />
          <?php echo '<input type="hidden" name="numero_compte" value="'.$user['numero_compte'].'" />'; ?>
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
