<!DOCTYPE html>
<html lang="en">
<?php



function monAutoloader($nomClass) {
    require 'models/' . $nomClass . '.php';
}

spl_autoload_register('monAutoloader');


?>
<?php include_once "_head.php" ?>

<body>

    <?php include_once "views/login/index.php" ?>
    <?php
   
    ?>
</body>
<?php include_once "_script.php" ?>

</html>