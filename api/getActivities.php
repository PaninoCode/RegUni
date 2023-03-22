<?php
require("../connect.php");

//header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$db_conn = $db->connect();


$sqlSELECT = sprintf("SELECT codice, nome, CFU, settore, TAF_Ambito, ore_lezione, ore_laboratorio, ore_tirocinio, tipo_insegnamento, descrizione_semestre FROM piano_di_studi;");

$result = $db_conn->query($sqlSELECT);

if ($result->num_rows >= 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo('<tr>
            <th scope="row" id="row_' . $row['codice'] . '">' . $row['codice'] . '</th>
            <td>' . $row['nome'] . '</td>
            <td>' . $row['CFU'] . '</td>
            <td>' . $row['settore'] . '</td>
            <td>' . $row['TAF_Ambito'] . '</td>
            <td>' . $row['ore_lezione'] + $row['ore_laboratorio'] + $row['ore_tirocinio'] . '</td>
            <td>' . $row['ore_lezione'] . '</td>
            <td>' . $row['ore_laboratorio'] . '</td>
            <td>' . $row['ore_tirocinio'] . '</td>
            <td>' . $row['tipo_insegnamento'] . '</td>
            <td>' . $row['descrizione_semestre'] . '</td>
            <td>
                <button type="button" class="btn btn-dark" onclick="startEdit(\'' . $row['codice'] . '\');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="startDelete(\'' . $row['codice'] . '\', \'' . $row['nome'] . '\');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </button>
            </td>
        </tr>');
    }
} else {
    echo "0 results";
}

$db_conn->close();

?>