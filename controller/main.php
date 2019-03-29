<?php
  require('model/users.php');
  require('authentication.php');

  function auth_routes($action) {
    if (isLoggedOn()) {
      switch ($action) {
        case 'home':
          require('view/accueil.php');
          break;
        case 'clients':
          $users = getUsers();
          require('view/ficheClient.php');
          break;
        case 'messagerie':
          $users = getUsers();
          require('view/messagerie.php');
          break;
        case 'virement':
          require('view/virement.php');
          break;
        default:
          require('view/erraction.php');
          break;
      }
    }
  }

?>
