<?php
require_once('db.php');

function changeBalance($numero_compte, $montant) {
    $montant = (int)$montant;
    $numero_compte = (int)$numero_compte;

    if ($montant < 0) {
        return false;
    }

    $user = findUserByAccount($numero_compte); // receiver

    if ($user['id_user'] === $_SESSION["connected_user"]['id_user']) { // if receiver = sender
        return false;
    }

    $futur_solde_sender = $_SESSION["connected_user"]['solde_compte'] - $montant;
    //echo "solde session : ".$_SESSION["connected_user"]['solde_compte']." et solde compte bdd = ".$solde;
    if ($futur_solde_sender < 0) {
        return false;
    }
    $_SESSION["connected_user"]['solde_compte'] = $futur_solde_sender;
    $futur_solde_receiver = $user['solde_compte'] + $montant;

    $result = query("update USERS set solde_compte=".$futur_solde_sender." where id_user=".$_SESSION["connected_user"]['id_user']);
    $result_2 = query("update USERS set solde_compte=".$futur_solde_receiver." where id_user=".$user['id_user']);
    return $result && $result_2;
}

?>
