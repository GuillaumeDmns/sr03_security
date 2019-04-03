<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
  <link rel="stylesheet" type="text/css" media="all"  href="/sr03_security/public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Accueil</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo $_SESSION["connected_user"]["prenom"]." ".$_SESSION["connected_user"]["nom"].", ".strtolower($_SESSION["connected_user"]["profil_user"]); ?></h2>
        <p>Vous avez <?php echo $_SESSION["connected_user"]["solde_compte"]; ?> sur votre compte.</p>
      </header>
      <div class="form">
        <form method="GET" >
          <input type="hidden" name="action" value="messagerie">
          <button>Messagerie</button>
        </form>
        <form method="GET" >
          <input type="hidden" name="action" value="virement">
          <button>Effectuer un virement</button>
        </form>
        <?php if ($_SESSION["connected_user"]["profil_user"] == "CONSEILLER") { ?>
        <form method="GET" >
        <input type="hidden" name="action" value="clients">
        <button>Fiches clients</button>
        </form>
        <?php } ?>
        <form method="GET" >
          <input type="hidden" name="action" value="disconnect">
          <button>Déconnexion</button>
        </form>
      </div>
    </article>
  </main>
</body>
</html>
