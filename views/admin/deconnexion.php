<?php



if (isset($_POST['deconnecter'])) {

    session_destroy();
    header( "Location:/index.php");
}
