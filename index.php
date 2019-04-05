<?php
  session_start();

  require('controller/main.php');

  if (isset($_GET['action'])) {
      if ($_GET['action'] == 'authenticate') {
          authenticate($_POST['login'],$_POST['mdp']);
      } else if ($_GET['action'] == 'disconnect') {
          disconnect();
      } else {
        auth_routes($_GET['action']);
      }
  }  else {
	auth_routes("home");
  }

?>
