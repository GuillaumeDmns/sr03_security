<?php
require_once('db.php');

function changeBalance($numero_compte, $montant) {
    $montant = (int)$montant;
    $numero_compte = (int)$numero_compte;
    
    if ($montant < 0) {
        return false;
    }

    $user = findUserByAccount($numero_compte);

    if ($user['id_user'] === $_SESSION["connected_user"]['id_user']) {
        return false;
    }

    $solde = $_SESSION["connected_user"]['solde_compte'] - $montant;

    if ($solde <= 0) {
        return false;
    }

    $solde_2 = $user['solde_compte'] + $montant;

    $result = query("update users set solde_compte=".$solde." where id_user=".$_SESSION["connected_user"]['id_user']);
    $result_2 = query("update users set solde_compte=".$solde_2." where id_user=".$user['id_user']);
    if ($result && $result_2) {
        return true;
    } else {
        return false;
    }
}

?>
