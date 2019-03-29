<?php
require('db.php');

function findUserByLoginPwd($login, $pwd) {
  $result = query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users where login='$login' and mot_de_passe='$pwd'");

  if ($result->num_rows === 0) {
    $utilisateur = false;
  } else {
    $utilisateur = $result->fetch_assoc();
  }

  return $utilisateur;
}


function getUsers() {
  $users = array();
  $result = query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from users");
  
  while ($user = $result->fetch_assoc()) {
    $users[$user['login']] = $user;
  }

  return $users;
}


?>
