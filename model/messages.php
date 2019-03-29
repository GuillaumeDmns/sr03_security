<?php
require_once('db.php');

function getMessages() {
  $messages = array();
  $result = query("select * from messages");
  
  while ($message = $result->fetch_assoc()) {
    $messages[$message['id_msg']] = $message;
  }

  return $messages;
}


?>
