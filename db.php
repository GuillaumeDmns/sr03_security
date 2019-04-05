<?php
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASSWD','natandanous');
define('DB_NAME','sr03');

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=sr03", 'root', 'natandanous');
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function query($q) {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

    if ($mysqli->connect_error) {
        throw new Exception('Erreur connection BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error, 1);
    } else {
        if (!$result = $mysqli->query($q)) {
            throw new Exception('Erreur requête BDD (' . $mysqli->connect_errno . ') '. $mysqli->connect_error . '//// query = ' . $q, 1);
        } else {
            return $result;
            $result->free();
        }
        $mysqli->close();
    }
}

?>
