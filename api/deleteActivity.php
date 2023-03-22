<?php
require("../connect.php");

//header("Content-type: application/json; charset=UTF-8");

if (empty($_POST['id'])) {
    http_response_code(400);
    echo "error_missing_data";
    die();
}

$db = new Database();
$db_conn = $db->connect();

$sqlDELETE = sprintf("DELETE FROM piano_di_studi WHERE piano_di_studi.codice='\"%s\"';",
    $db_conn->real_escape_string($_POST['id']),
);

$result = $db_conn->query($sqlDELETE);

echo $result;

$db_conn->close();

?>