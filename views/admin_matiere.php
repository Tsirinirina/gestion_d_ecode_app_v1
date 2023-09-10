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


$msg = null;

if (isset($_GET['id'])) {
    $matiere = new Matiere();
    $res = $matiere->supprimerMatier($_GET['id']);

    if ($res == true) {
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
    mysqli_close($con);
}
?>

<?php

if (isset($_POST['ajouterMatiere'])) {
    if (!empty($_POST['nom']) || !empty($_POST['heure']) || !empty($_POST['semestre']) || !empty($_POST['coeff'])) {

        $nom = $_POST['nom'];
        $heure = $_POST['heure'];
        $semestre = $_POST['semestre'];
        $coeff = $_POST['coeff'];
        $id_prof = $_POST['id_prof'];
        $user = new Utilisateur();
        $res = $user->siExiste('matiere', $nom);
        if ($res == false) {
            $matiere = new Matiere();
            $res = $matiere->ajouterMatiere($nom, $heure, $semestre, $coeff, $id_prof);
            if ($res == true) {
                $msg =
                    '<div class="alert alert-success alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-smile-o"></i></strong> Ajout avec success.
                                                </div>';
            } else {
                $msg = '<div class="alert alert-danger alert-dismissible fade show">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                        <strong><i class="fa fa-frown-o"></i></strong> Erreur sur insertion.
                                                    </div>';
            }
        } else {
            $msg = '<div class="alert alert-info alert-dismissible fade show">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                        <strong><i class="fa fa-thumbs-down"></i></strong> Ce matiere existe déjà.
                                                    </div>';
        }
    } else {
        $msg = '<div class="alert alert-warning alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-thumbs-o-down"></i></strong> Veuillez remplir les champs.
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
                            <a href="admin_accueil.php" class="nav-link ">Tableau de Bord </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin_prof.php">Professeur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin_eleve.php">Élève</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_matiere.php" aria-current="page">Matière</a>
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
            <div class="main_titre">
                <img src="img/LogoFinale.png" width="150px" alt="">
                <div class="main_greet">
                    <h1>Bonjour</h1>
                    <p>Bienvenue dans l' espace administratif</p>
                </div>
            </div>
            <div>
                <?= $msg ?>
            </div>
            <div class=" d-flex "  style="width: 150px;">
                <i class="fa fa-book fa-2x text-info me-auto"></i>
                <h2 class="ms-auto">Matière</h2>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="datatable bg-white border rounded-5 p-2 table-responsive">
                        <table class="table  bg-white  table-sm">
                            <thead class="bg-light">
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">Nom</th>
                                    <th class="th-sm">Heure</th>
                                    <th class="th-sm">Semestre</th>
                                    <th class="th-sm">Coefficient</th>
                                    <th class="th-sm">Prof</th>
                                    <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $prof = new Prof();
                                $matiere = new Matiere();
                                $res = $matiere->afficherMatiere();
                                if (mysqli_num_rows($res) > 0) {
                                    while ($donnes = mysqli_fetch_assoc($res)) {
                                        $id_matiere = $donnes['id_matiere'];
                                        echo "<tr><td>" . $donnes['id_matiere'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['nom'] . "</td>";
                                        echo "<td>" . $donnes['heure'] . "</td>";
                                        echo "<td>" . $donnes['semestre'] . "</td>";
                                        echo "<td>" . $donnes['coef'] . "</td>";
                                        echo "<td>" . $donnes['prenom'] . "</td>";
                                ?>
                                        <td>
                                            <form action='' method='post' class=' d-flex flex-row'>
                                                <a class='btn btn-outline-primary btn-sm mx-1' href=''><i class='fa fa-edit  '></i></a>
                                                <a class='btn btn-outline-danger btn-sm ' href='admin_matiere.php?id=<?= $id_matiere ?>' type='submit' name='supprimer'><i class='fa fa-trash '></i></a>
                                            </form>
                                        </td>
                                <?php
                                    }
                                }
                                ?>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
                <div class="col-lg-2 bg-white border rounded-5 p-3 ">
                    <div class="carte_titr">
                        <h2>Formulaire </h2>
                    </div>
                    <hr class="separateur">
                    <div class="carte_contenue">
                        <form class="" method="POST">
                            <div class="info_pers">
                                <label class="form-label">Nom du matière</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Entrer le nom du matière" name="nom">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Heure</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Entrez l'heure total" name="heure" min="2">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Semestre</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Entrer le nom du matière" name="semestre" min="1">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Coefficient</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Entrez le coefficient" name="coeff" min="1">
                            </div>
                    </div>
                    <div class="info_fonction">
                        <div class="mb-1">
                            <label class="form-label">Responsable</label>
                            <select class="form-select form-select-sm" aria-label="Small select example" name="id_prof">
                                <?php
                                $prof = new Prof();
                                $res = $prof->afficherProf();
                                if (mysqli_num_rows($res) > 0) {
                                    while ($donne = mysqli_fetch_assoc($res)) {
                                        $id_prof = $donne['id_prof'];
                                        $nom = $donne['nom'];
                                        $prenom = $donne['prenom'];
                                ?>
                                        <option value="<?= $id_prof ?>"><?= $prenom ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <button name="ajouterMatiere" class="btn btn-primary btn-sm w-100 mt-3" type="submit">Ajouter</button>
                    </div>
                    </form>
                </div>

            </div>
    </div>
    </main>
    </div>

</body>
<?php include_once "_script.php" ?>


</html>