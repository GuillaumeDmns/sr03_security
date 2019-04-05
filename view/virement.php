<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Virement</title>
  <link rel="stylesheet" type="text/css" media="all"  href="/sr03_security/public/css/mystyle.css" />
</head>
<body>
  <header>
    <h1>Virement</h1>
  </header>
  <main>
    <article>
      <header>
        <h2>Bienvenue <?php echo htmlspecialchars($_SESSION["connected_user"]["prenom"]);?> <?php echo htmlspecialchars($_SESSION["connected_user"]["nom"]);?></h2>
        <p>Vous avez <?php echo htmlspecialchars($_SESSION["connected_user"]["solde_compte"]); ?> sur votre compte.</p>
      </header>
      <div class="form">
        <?php echo $message; ?> <br />
        <form method="GET" >
          <input type="hidden" name="action" value="clients">
          <button>Clients</button>
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
