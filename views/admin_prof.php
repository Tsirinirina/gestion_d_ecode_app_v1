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
                            <a class="nav-link active" href="admin_prof.php" aria-current="page">Proffesseur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_eleve.php">Eleve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_matiere.php">Matiere</a>
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


            <div class="row">

                <div class="carte_titr">
                    <h2>Proffesseur</h2>
                    <div class="input-group mb-0" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Recherche..." aria-label="Recherche" aria-describedby="basic-addon1">
                        <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
                    </div>

                    <i class="fa fa-group fa-2x text-info"></i>
                </div>
                <div class="col-lg-10">
                    <div class="datatable bg-white border rounded-5 p-2 table-responsive">

                        <table class="table  bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th class="th-sm">#</th>
                                    <th class="th-sm">Nom</th>
                                    <th class="th-sm">Date de naissance</th>
                                    <th class="th-sm">Heure</th>
                                    <th class="th-sm">Email</th>
                                    <th class="th-sm">Téléphone</th>
                                    <th class="th-sm">Identifiant</th>
                                    <th class="th-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $msg2 = null;
                                if (isset($_POST['rechercher'])) {

                                    $mots = $_POST['inputRecherche'];
                                    $user = new Utilisateur();
                                    $result = $user->recherche($_POST['inputRecherche']);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($result)) {
                                            echo "<tr><td>" . $donnes['id_prof'] . "</td>";
                                            echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                            echo "<td>" . $donnes['date_naissance'] . "</td>";
                                            echo "<td>" . $donnes['heure_de_trav'] . "</td>";
                                            echo "<td>" . $donnes['email'] . "</td>";
                                            echo "<td>" . $donnes['tel'] . "</td>";
                                            echo "<td><span class='badge rounded-pill badge-secondary'>" . $donnes['identifiant'] . "</span></td>";
                                ?>
                                            <td>
                                                <form action='' method='post' class=' d-flex flex-row'>
                                                    <a class='btn btn-outline-primary  btn-sm mx-1' href=''><i class='fa fa-edit'></i></a>
                                                    <a class='btn btn-outline-danger  btn-sm' href='admin_prof.php?id=<?= $id_prof ?>' name='supprimer'><i class='fa fa-trash'></i></a>
                                                </form>

                                            </td>

                                        <?php    }
                                    }
                                } else {
                                    $prof = new Prof();
                                    $res = $prof->afficherProf();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($res)) {
                                            $id_prof = $donnes['id_prof'];
                                            echo "<td>" . $donnes['id_prof'] . "</td>";
                                            echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                            echo "<td>" . $donnes['date_naissance'] . "</td>";
                                            echo "<td>" . $donnes['heure_de_trav'] . "</td>";
                                            echo "<td>" . $donnes['email'] . "</td>";
                                            echo "<td>" . $donnes['tel'] . "</td>";
                                            echo "<td><span class='badge rounded-pill badge-secondary'>" . $donnes['identifiant'] . "</span></td>";
                                        ?>
                                            <td>
                                                <form action='' method='post' class=' d-flex flex-row'>
                                                    <a class='btn btn-outline-primary  btn-sm mx-1' href=''><i class='fa fa-edit'></i></a>
                                                    <a class='btn btn-outline-danger  btn-sm ' href='admin_prof.php?id=<?= $id_prof ?>' name='supprimer'><i class='fa fa-trash'></i></a>
                                                </form>

                                            </td>
                                            </tr>
                                <?php
                                        }
                                    }
                                }

                                if (isset($_GET['id'])) {
                                    $prof = new Prof();
                                    $msg2 = null;
                                    $matiere = new Matiere();

                                    $res2 = $matiere->matiereDeProf($_GET['id']);
                                    if (mysqli_num_rows($res2) > 0) {
                                        while ($donne = mysqli_fetch_assoc($res2)) {
                                            $id_matiere = $donne['id_matiere'];
                                            $res2 = $matiere->supprimerMatierDeProf($id_matiere, $_GET['id']);
                                            $res = $prof->supprimerProf($_GET['id']);
                                        }
                                    }


                                    if ($res === true) {
                                        $msg2 =
                                            '<div class="alert alert-success alert-dismissible fade show mt-3">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><i class="fa fa-smile-o"></i></strong> Suppression avec success.
            </div>';
                                    } else {
                                        $msg2 =
                                            '<div class="alert alert-danger alert-dismissible fade show mt-3">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong><i class="fa fa-frown-o"></i></strong> Erreur sur suppression .
            </div>';
                                    }
                                }
                                echo $msg2;
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-2  bg-white border rounded-5 p-3 table-responsive mt-3">
                    <div class="carte_titr ">
                        <h2>Formulaire </h2>

                    </div>
                    <hr class="separateur">
                    <div class="carte_contenue">
                        <form class="" method="POST">
                            <div class="info_pers">
                                <div class="mb-1">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le nom" name="nom_prof">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le prénom" name="prenom_prof">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control form-control-sm" placeholder="Entrez le nom" name="date_Prof" value="1999-01-01" min="1999-01-01">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez l'email " name="email_Prof">
                                </div>

                            </div>
                            <div class="info_fonction">
                                <div class="mb-1">
                                    <label class="form-label">Fonction</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example" name="fonction">
                                        <option selected value="Professeur">Professeur</option>
                                        <option value="Chef">Chef d'établissement</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le téléphone " name="tel_Prof">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Heure de travaille</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrer l' heure de travaille " name="heure_Prof">
                                </div>
                                <input name="ajouterProf" class="btn btn-primary btn-sm mt-2 w-100" type="submit" value="Ajouter">
                            </div>
                            <?php
                            $msg = null;
                            if (isset($_POST['ajouterProf'])) {
                                if (!empty($_POST['nom_prof']) || !empty($_POST['prenom_prof']) || !empty($_POST['email_Prof']) || !empty($_POST['heure_Prof']) || !empty($_POST['tel_Prof'])) {
                                    $admin = new Admin();
                                    $nom = $_POST['nom_prof'];
                                    $prenom = $_POST['prenom_prof'];
                                    $date = $_POST['date_Prof'];
                                    $email = $_POST['email_Prof'];
                                    $fonction = $_POST['fonction'];
                                    $heure = $_POST['heure_Prof'];
                                    $tel = $_POST['tel_Prof'];
                                    $mdp = md5("azerty");
                                    $premier = null;
                                    $auth = 0;
                                    if ($fonction == "Chef") {
                                        $auth = 2;
                                        $premier = "C-000";
                                    }
                                    if ($fonction == "Professeur") {
                                        $auth = 3;
                                        $premier = "P-000";
                                    }
                                    $prof = new Prof();
                                    $res = $prof->compterIdentification();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($res)) {
                                            $id_prof = $donnes['identifiant'];
                                        }
                                        $l = strlen($id_prof);
                                        $dernier_nombre = substr($id_prof, -4, $l);
                                        $dernier_nombre = $dernier_nombre + 1;
                                        $identifiant = $premier . "" . $dernier_nombre;
                                    }
                                    $user = new Utilisateur();
                                    $existe = $user->siUserExiste('proffesseur', $nom, $prenom);

                                    $res = $admin->ajouterProf($nom, $prenom, $date, $heure, $email, $tel, $identifiant, $mdp, $auth);
                                    if ($res == true) {

                                        $msg =
                                            '<div class="alert alert-success alert-dismissible fade show mt-3">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                <strong><i class="fa fa-smile-o"></i></strong> Ajout avec success.
                                            </div>';
                                    } else {
                                        include_once "admin_prof.php";
                                        $msg = '<div class="alert alert-danger alert-dismissible fade show mt-3">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-frown-o"></i></strong> Erreur sur insertion.
                                                </div>';
                                    }
                                } else {
                                    include_once "admin_prof.php";
                                    $msg = '<div class="alert alert-warning alert-dismissible fade show mt-3">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-thumbs-o-down"></i></strong> Veuillez remplir les champs.
                                                </div>';
                                }
                            }
                            echo $msg;
                            ?>
                        </form>
                    </div>

                </div>
            </div>




        </main>


    </div>


</body>
<?php include_once "_script.php" ?>


</html>