
<?php
header('Content-Type: application/json; charset=utf-8');
require("../../client/connect.php");

$idStd = isset($_GET['id']) ? $_GET['id'] : '';

$query = "SELECT * FROM detail_std WHERE id_std = '$idStd'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '{
        "id_std": "' . $row["id_std"] . '",
        "fname": "' . $row["fname"] . '",
        "lname": "' . $row["lname"] . '",
        "email": "' . $row["email"] . '",
        "DateOfBirth": "' . $row["DateOfBirth"] . '",
        "faculty": "' . $row["faculty"] . '",
        "branch": "' . $row["branch"] . '",
        "sch_year": "' . $row["sch_year"] . '"
    }';
} else {
    echo '{
        "id_std": "",
        "fname": "",
        "lname": "",
        "email": "",
        "DateOfBirth": "",
        "faculty": "",
        "branch": "",
        "sch_year": ""
    }';
}
