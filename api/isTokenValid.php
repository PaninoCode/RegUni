<?php
require("connect.php");

//header("Content-type: application/json; charset=UTF-8");

if (!isset($_COOKIE['status']) || !isset($_COOKIE['badge'])) {
    setcookie("status", "error_logged_out", 0, "/");
    header('Location: ?login');
}

$db = new Database();
$db_conn = $db->connect();

$sqlSELECT = sprintf("SELECT numero_badge, token, last_login
                FROM utenti
                WHERE token = '%s' AND numero_badge = '%s'  AND last_login > NOW() - INTERVAL 1 DAY",
    $db_conn->real_escape_string($_COOKIE['token']),
    $db_conn->real_escape_string($_COOKIE['badge'])
);

$result = $db_conn->query($sqlSELECT);

if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["lastname"] . "<br>";
        //echo json_encode($row);
        //echo $row["numero_badge"];
        //echo $row["token"];
        //echo $row["last_login"];
    }
} else {
    setcookie("status", "error_logged_out", 0, "/");
    header('Location: ?login');
}

$db_conn->close();

?>