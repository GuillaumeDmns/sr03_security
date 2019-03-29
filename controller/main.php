<?php
  require_once('model/users.php');
  require_once('model/messages.php');
  require_once('authentication.php');

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
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            createMessage();
          }

          $users = getUsers();
          $messages = getMessages();

          require('view/messagerie.php');
          break;
        case 'virement':
          if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: http://localhost/sr03_security/?action=clients');
            break; 
          }

          require('view/virement.php');
          break;
        default:
          require('view/erraction.php');
          break;
      }
    }
  }

?>
