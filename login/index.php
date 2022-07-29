<?php

header('Content-Type: application/json; charset=UTF-8');

require("../../client/connect.php");

$username = isset($_GET['username']) ? $_GET['username'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

$query = "SELECT * FROM ac_std WHERE id_std = '$username' AND `password` = '$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '{"status":"success"}';
} else {
    echo '{"status":"fail"}';
}
