<!DOCTYPE html>
<html lang="en">
<?php
require_once "../bootstrapForm.php";
session_start();

function monAutoloader($classN) {
    require '../models/' . $classN . '.php';
}

spl_autoload_register('monAutoloader');

if (!isset($_SESSION['pseudo'])) {
    header("Location:/gestion_d_ecole/index.php");
}
?>
<body>
    <p>ELEVE ! BIENVENUE </p>
    <p><?= $_SESSION['pseudo']  ?></p>

    <form action="" method="post">
        <button class="btn btn-dark" name="deconnecter">Déconnexion </button>
        <?php 
        if(isset($_POST['deconnecter'])){
            session_destroy();
            header("Location:/gestion_d_ecole/index.php");
        }
        ?>
    </form>

</body>

</html>