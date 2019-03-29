<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Messages</title>
  <link rel="stylesheet" type="text/css" media="all"  href="/sr03_security/public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Messages</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo $_SESSION["connected_user"]["prenom"];?> <?php echo $_SESSION["connected_user"]["nom"];?></h2>
      </header>
      <div class="liste">
          <table>
            
          </table>
      </div>
      <div class="form">
        <form method="POST">
          <select name="user">
            <?php
              foreach ($users as $key => $user) {
                echo '<option value="'.$user['id'].'">'.$user['prenom'].' '.$user['nom'].'</option>';
              }

            ?>
          </select>
          <br />
          <textarea name="message" rows="10"></textarea>
          <input type="hidden" name="action" value="send_message">
          <button>Envoyer</button>
        </form>
      </div>
      <div class="form">
        <form method="GET" >
          <input type="hidden" name="action" value="home">
          <button>Accueil</button>
        </form>
      </div>
    </article>
  </main>
</body>
</html>
