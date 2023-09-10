<?php
if (isset($_GET['id'])) {
    $db = new ConnectBase();
    $id_matiere = $_GET['id'];
    echo "" . $_GET['id'];
    $con = $db->getConnex();
    $msg = false;
    $sql = "DELETE FROM `matiere` WHERE `matiere`.`id_matiere` = 3 ";

    if (mysqli_query($con, $sql)) {
        //header("Location:admin_matiere.php");
        echo "OK";
    } else {
        //header("Location:admin_matiere.php");
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    // if ($res == true) {
    //     $msg =
    //         '<div class="alert alert-success alert-dismissible fade show">
    //             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    //             <strong>Success!</strong> Suppression avec success.
    //         </div>';
    // } else {
    //     $msg =
    //         '<div class="alert alert-danger alert-dismissible fade show">
    //             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    //             <strong>Success!</strong> Erreur sur suppression .
    //         </div>';
}
