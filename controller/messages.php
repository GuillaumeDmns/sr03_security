<?php
function sendMessage() {
    $result = query("insert into messages values(NULL,'".$_POST['id_user_to']."','".$_SESSION["connected_user"]['id_user']."','".$_POST['sujet_msg']."','".$_POST['corps_msg']."')");
}
?>
