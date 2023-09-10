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
<link rel="stylesheet" href="style.css">

</style>

<body>
    <div class="top ">
        <?php require_once "navbar.php" ?>
    </div>
    <div class="body row">

            <?php require_once "body.php" ?>
        
    </div>
    <div class="bottom">
        <?php require_once "footer.php" ?>
    </div>
</body>
<?php include_once "../_script.php" ?>


</html>