<!DOCTYPE html>
<html lang="en">
<?php

session_start();

function monAutoloader($classN)
{
    require '../models/' . $classN . '.php';
}

spl_autoload_register('monAutoloader');


if (!isset($_SESSION['pseudo'])) {
    header("Location:/gestion_d_ecole/index.php");
}

include_once "_head.php";
?>

<?php
$msg = null;

if (isset($_GET['id'])) {
    $eleve = new Eleve();
    $res = $eleve->supprimerEleve($_GET['id']);

    if ($res === true) {
        $msg =
            '<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><i class="fa fa-smile-o"></i></strong> Suppression avec success.
            </div>';
    } else {
        $msg =
            '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><i class="fa fa-frown-o"></i></strong> Erreur sur suppression .
            </div>';
    }
}

if (isset($_GET['id'])) {
    $prof = new Prof();
    $res = $prof->supprimerProf($_GET['id']);

    if ($res === true) {
        $msg =
            '<div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <strong><i class="fa fa-smile-o"></i></strong> Suppression avec success.
                                        </div>';
    } else {
        $msg =
            '<div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <strong><i class="fa fa-frown-o"></i></strong> Erreur sur suppression .
                                        </div>';
    }
}

?>

<body>

    <div class="conteneure">
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><a href="admin_accueil.php"><img src="img\logo1.png" alt="LOGO" srcset=""></a></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="admin_accueil.php" class="nav-link active" aria-current="page">Tableau de Bord </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_prof.php">Professeur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_eleve.php">Élève</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_matiere.php">Matière</a>
                        </li>
                    </ul>


                    <div class="d-flex align-items-center">
                        <div class="lettre-encadree me-3">

                            <?php
                            $pesudo = $_SESSION['pseudo'];
                            $char = substr($pesudo, 0, 1);
                            echo $pesudo;
                            ?>
                        </div>
                        <form action="" method="post">
                            <button class="btn btn-dark px-3" name="deconnecter"><i class="fa fa-power-off"></i></button>
                            <?php
                            if (isset($_POST['deconnecter'])) {
                                session_destroy();
                                header("Location:../index.php");
                            }
                            ?>

                        </form>


                    </div>
                </div>
        </nav>

        <main class="main_contenue">
            <div class="">
                <img src="img/LogoFinale.png" width="150px" alt="">
                <div class="">
                    <h1>Bonjour</h1>
                    <p>Bienvenue dans l' espace administratif</p>
                </div>
            </div>
            <div>
                <?php echo $msg; ?>

            </div>
            <div class="row  my-3">
                <div class="col-lg-4 mb-3">
                    <div class="card border border-secondary shadow-3">
                        <div class="card-body row">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-content-center flex-column ">
                                    <i class="fa fa-user fa-3x text-primary text-center my-2"></i>
                                </div>
                                <div class="col-10 d-flex justify-content-evenly mt-2">
                                    <h2 class="text-end"><span class="badge badge-primary">Professeur</span></h2>
                                    <h3 class="text-start mt-1"><span class="badge rounded-pill badge-danger">
                                            <?php
                                            $prof = new Prof();
                                            $res = $prof->compterProf();
                                            if (mysqli_num_rows($res) > 0) {
                                                $i = 0;
                                                while ($donnes = mysqli_fetch_assoc($res)) {
                                                    $i = 1 + $i;
                                                }
                                            }
                                            ?> <?php echo $i ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card border border-secondary shadow-3">
                        <div class="card-body row">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-content-center flex-column ">
                                    <i class="fa fa-user-group fa-3x text-primary text-center my-2"></i>
                                </div>
                                <div class="col-10 d-flex justify-content-evenly mt-2">
                                    <h2 class="text-end"><span class="badge badge-primary">Élève</span></h2>
                                    <h3 class="text-start mt-1"><span class="badge rounded-pill badge-danger">
                                            <?php
                                            $prof = new Eleve();
                                            $res = $prof->compterEleve();
                                            if (mysqli_num_rows($res) > 0) {
                                                $i = 0;
                                                while ($donnes = mysqli_fetch_assoc($res)) {
                                                    $i = 1 + $i;
                                                }
                                            }
                                            ?><?php echo $i ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card border border-secondary shadow-3">
                        <div class="card-body row">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-content-center flex-column ">
                                    <i class="fa fa-book fa-3x text-primary text-center my-2"></i>
                                </div>
                                <div class="col-10 d-flex justify-content-evenly mt-2">
                                    <h2 class="text-end"><span class="badge badge-primary">Matière</span></h2>
                                    <h3 class="text-start mt-1"><span class="badge rounded-pill badge-danger">
                                            <?php

                                            $prof = new Matiere();
                                            $res = $prof->compterMatiere();
                                            if (mysqli_num_rows($res) > 0) {
                                                $i = 0;
                                                while ($donnes = mysqli_fetch_assoc($res)) {
                                                    $i = 1 + $i;
                                                }
                                            }

                                            ?><?php echo $i ?>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-2">

                <div class="col-lg-6">
                    <h2>Professeur</h2>
                    <div class="datatable bg-white border rounded-5 p-2 table-responsive">

                        <table class="table  bg-white table-sm">
                            <thead class="bg-light">
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">Nom</th>
                                    <th class="th-sm">Heure</th>
                                    <th class="th-sm">Identifiant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $msg2 = null;
                                $prof = new Prof();
                                $res = $prof->afficherProf();
                                if (mysqli_num_rows($res) > 0) {
                                    while ($donnes = mysqli_fetch_assoc($res)) {
                                        $id_prof = $donnes['id_prof'];
                                        echo " <tr><td>" . $donnes['id_prof'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                        echo "<td>" . $donnes['heure_de_trav'] . "</td>";
                                        echo "<td><span class='badge rounded-pill badge-secondary'>" . $donnes['identifiant'] . "</span></td>";
                                ?>
                                        </tr>
                                <?php

                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h2>Étudiant</h2>
                    <div class="datatable bg-white border rounded-5 p-2 table-responsive">
                        <table class="table  bg-white  table-sm">
                            <thead class="bg-light">
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">Nom</th>
                                    <th class="th-sm">Niveau</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                             
                                $eleve = new Eleve();
                                $res = $eleve->afficherEleve();
                                if (mysqli_num_rows($res) > 0) {
                                    while ($donnes = mysqli_fetch_assoc($res)) {
                                        $id_eleve = $donnes['id_eleve'];
                                        echo "<tr><td>" . $donnes['id_eleve'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                        echo "<td><span class='badge rounded-pill badge-secondary'>" . $donnes['identifiant'] . "</span></td>";

                                ?>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>



    </div>

</body>
<?php include_once "_script.php" ?>


</html>