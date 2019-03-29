<?php
require_once('db.php');

function findUserByLoginPwd($login, $pwd) {
  $result = query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from USERS where login='$login' and mot_de_passe='$pwd'");

  if ($result->num_rows === 0) {
    $utilisateur = false;
  } else {
    $utilisateur = $result->fetch_assoc();
  }

  return $utilisateur;
}

function findUserByAccount($numero_compte) {
  $result = query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from USERS where numero_compte='$numero_compte'");

  if ($result->num_rows === 0) {
    $utilisateur = false;
  } else {
    $utilisateur = $result->fetch_assoc();
  }

  return $utilisateur;
}


function getUsers() {
  $users = array();
  $result = query("select nom,prenom,login,id_user,numero_compte,profil_user,solde_compte from USERS");

  while ($user = $result->fetch_assoc()) {
    $users[$user['login']] = $user;
  }

  return $users;
}


?>
