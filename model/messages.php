<?php
require_once('db.php');

function getMessages() {
  $messages = array();
  $result = query("select * from MESSAGES");
  
  while ($message = $result->fetch_assoc()) {
    $messages[$message['id_msg']] = $message;
  }

  return $messages;
}

function createMessage() {
    $result = query("insert into MESSAGES values(NULL,'".$_POST['id_user_to']."','".$_SESSION["connected_user"]['id_user']."','".$_POST['sujet_msg']."','".$_POST['corps_msg']."')");
}

?>
