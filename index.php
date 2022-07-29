<?php
$user = isset($_GET["user"]) ? $_GET["user"] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลตรวจ ATK ของ <?php echo $user; ?></title>
    <?php include 'components/head.php'; ?>
</head>

<body>
    <?php 
    include 'pages/atk.php';
    include 'components/script.php';
    ?>
</body>

</html>