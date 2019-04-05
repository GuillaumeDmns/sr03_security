<?php
function isLoggedOn() {
  if(!isset($_SESSION["connected_user"]) || $_SESSION["connected_user"] == "") {
      // utilisateur non connecté
      require('view/login.php');
      return false;
  }
  return true;
}

function authenticate($login, $mdp) {
  if (isset($_SESSION['token']) AND isset($_GET['token']) AND !empty($_SESSION['token']) AND !empty($_GET['token'])) {
    if ($_SESSION['token'] == $_GET['token']) {
      if ($login == "" || $mdp == "") {
        // manque login ou mot de passe
        $errmsg = "nullvalue";
        require('view/login.php');
      } else {
        $utilisateur = findUserByLoginPwd($login, $mdp);
        if ($utilisateur == false) {
          // echec authentification
          require('view/errauthent.php');
        } else {
          $_SESSION["connected_user"] = $utilisateur;
          require('view/accueil.php');
        }
      }
    }
  } else {
    require('view/errauthent.php');
  }  
}

function disconnect() {
  unset($_SESSION["connected_user"]);
  require('view/login.php');
}

?>
