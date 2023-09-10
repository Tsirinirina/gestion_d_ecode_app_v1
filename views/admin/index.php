<!DOCTYPE html>
<html lang="en">
<?php
session_start();

function monAutoloader($classN) {
    require '../models/' . $classN . '.php';
}

spl_autoload_register('monAutoloader');

if (!isset($_SESSION['pseudo'])) {
    header("Location:/gestion_d_ecole/index.php");
}

include_once "../_head.php";
?>


</style>

<body>

    <?php require_once "accueil.php" ?>

</body>
<?php include_once "../_script.php" ?>


</html>