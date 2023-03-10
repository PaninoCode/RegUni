<?php
require("../connect.php");

//header("Content-type: application/json; charset=UTF-8");

if (empty($_POST['badge']) || empty($_POST['password']) || empty($_POST['callback'])) {
    http_response_code(400);
    setcookie("status", "error_missing_data", 0, "/");
    header('Location: ' . $_POST['callback']);
    die();
}

$db = new Database();
$db_conn = $db->connect();

$token = hash('sha256', rand());
$password = hash('sha256', $_POST['password']);


$sqlSELECT = sprintf("SELECT numero_badge, password
                FROM utenti
                WHERE numero_badge = '%s' AND password = '%s'",
    $db_conn->real_escape_string($_POST['badge']),
    $db_conn->real_escape_string($password)
);

$sqlUPDATE = sprintf("UPDATE utenti
                SET token = '%s', last_login = NOW()
                WHERE numero_badge = '%s'",
    $db_conn->real_escape_string($token),
    $db_conn->real_escape_string($_POST['badge'])
);

$result = $db_conn->query($sqlSELECT);

if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //Password in chiaro, da cambiare ad una più sicura
        setcookie("badge", $row["numero_badge"], 0, "/");
        $db_conn->query($sqlUPDATE);
        setcookie("token", $token, 0, "/");
        setcookie("status", "success", 0, "/");
        header('Location: '. substr($_POST['callback'], 0, strpos($_POST['callback'], "?")));
    }
} else {
    setcookie("status", "error_wrong_data", 0, "/");
    header('Location: ' . $_POST['callback']);
}

$db_conn->close();

?>