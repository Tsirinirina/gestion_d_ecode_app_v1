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

include_once "_head.php";
?>


<link rel="stylesheet" href="css/style.css">

<style>
    body {
        background: #1c1c1c;

    }

    .nom_util {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        place-content: center;
        place-items: center;
        border: 2px solid #fff;
        border-radius: 50%;
        font-size: 25px;
    }

    .card {
        width: 400px;
        height: 550px;
    }

    .bg-gray-dark {
        background: #343435;
    }

    .dark {
        background: #1d1c1c;
    }

    .gris {
        background: #424141;
        border-bottom: 2px solid rgb(21, 21, 21);
    }

    .avatar {
        border: 1px solid rgb(169, 169, 169);
        border-radius: 50%;
    }

    .ligne {
        border-bottom: 2px solid rgb(103, 103, 103);
    }
    #modification{
        display: none;
    }
    .afficher{
        display: block;
    }
</style>


<body class="body">

    <div class="conteneure">

        <nav class="navbar">
            <div class="nav_icon" onclick="sideOuvert()">
                <i class="fa fa-bars"></i>
            </div>
            <div class="nav_gauche">
                <a href="admin_accueil.php"><img src="img\logo1.png" alt="LOGO" srcset=""></a>
            </div>
            <div class="nav_centre">
                <a href="chef_accueil.php">Tableau de Bord </a>
                <a href="chef_prof.php">Proffesseur</a>
                <a href="chef_eleve.php">Eleve</a>
                <a href="chef_matiere.php">Matiere</a>

            </div>
            <div class="nav_droit">
                <form action="" method="post">
                    <button class="btn btn-outline-light" name="deconnecter">Déconnexion</button>
                    <?php
                    if (isset($_POST['deconnecter'])) {
                        session_destroy();
                        header("Location:../index.php");
                    }
                    ?>
                </form>
                <a href="profiles.php" class="nom_util">
                    <?php
                    $pesudo = $_SESSION['pseudo'];
                    $char = substr($pesudo, 0, 1);
                    echo $char;
                    ?>
                </a>

            </div>
        </nav>

        <main class="container-fluid dark d-flex justify-content-center">
            <div class="card mt-4 bg-gray-dark">
                <div class="card-header d-flex justify-content-center text-light gris">
                    <img class="avatar" src="img/avatar.jpg" width="70px" alt="">
                </div>
                <div class="card-body text-light">
                    <div class="d-flex justify-content-center ">
                        <h4>Profiles </h4>
                    </div>
                    <?php
                    $prof = new Prof();
                    $res = $prof->afficherInfoProf($_SESSION['pseudo']);
                    $donne = mysqli_fetch_assoc($res);
                    ?>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Nom </div>
                        <div class="col-7 ">
                            <?= $donne['nom']; ?>
                        </div>
                    </div>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Prenom </div>
                        <div class="col-7 ">
                            <?= $donne['prenom']; ?>
                        </div>
                    </div>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-6">Date de naissance </div>
                        <div class="col-6 ">
                            <?= $donne['date_naissance']; ?>
                        </div>
                    </div>

                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Email </div>
                        <div class="col-7 ">
                            <?= $donne['email']; ?>
                        </div>
                    </div>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Télephone </div>
                        <div class="col-7 ">
                            <?= $donne['tel']; ?>
                        </div>
                    </div>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Identifiant </div>
                        <div class="col-7 ">
                            <?= $donne['identifiant']; ?>
                        </div>
                    </div>
                    <div class="row ligne mx-2 my-3">
                        <div class="col-5">Mots de passe </div>
                        <div class="col-7 ">

                            <a href="profiles.php?id=<?= $donne['id_prof']; ?>" id="modifMdp">Modifier Mots de passe</a>
                        </div>
                    </div>
                    <div id="modification">
                        <div class="row mx-2 ">
                            <button class="btn btn-primary col-6 ">Annuler</button>
                            <button class="btn btn btn-warning col-6" >Modifier</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script>
        let modif = document.getElementById("modification");
       document.getElementById("modifMdp").addEventListener('click',function(){
        modif.classList.toggle("afficher");
       });
    </script>
</body>
<?php include_once "_script.php" ?>


</html>