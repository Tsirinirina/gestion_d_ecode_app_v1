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

        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
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
                            <a class="nav-link " href="admin_prof.php">Proffesseur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin_eleve.php" >Eleve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_matiere.php"  aria-current="page">Matiere</a>
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



            <div class="liste_centre">
                <div class="cart_liste">
                    <div class="carte_titr">
                        <h2>Matiere</h2>
                        <i class="fa fa-book fa-2x text-info"></i>
                    </div>
                    <table class="tableau">
                        <tr class="table_titre">
                            <td>N°</td>
                            <td>Nom</td>
                            <td>Heure</td>
                            <td>Semèstre</td>
                            <td>Coefficient</td>
                            <td>Prof </td>
                            <td>Action</td>
                        </tr>
                        <tr class="table_contenue">

                            <?php
                            $prof = new Prof();

                            $msg2 = null;

                            $matiere = new Matiere();
                            $res = $matiere->afficherMatiere();
                            if (mysqli_num_rows($res) > 0) {
                                while ($donnes = mysqli_fetch_assoc($res)) {
                                    $id_matiere = $donnes['id_matiere'];
                                    echo "<td>" . $donnes['id_matiere'] . "</td>";
                                    echo "<td class='fw-bold'>" . $donnes['nom'] . "</td>";
                                    echo "<td>" . $donnes['heure'] . "</td>";
                                    echo "<td>" . $donnes['semestre'] . "</td>";
                                    echo "<td>" . $donnes['coef'] . "</td>";
                                    echo "<td>" . $donnes['id_prof'] . "</td>";



                            ?>
                                    <td>
                                        <form action='' method='post'>
                                            <a class='btn btn-outline-primary' href=''><i class='fa fa-edit  '></i></a>
                                            <a class='btn btn-outline-danger' href='admin_matiere.php?id=<?= $id_matiere ?>' type='submit' name='supprimer'><i class='fa fa-trash '></i></a>
                                        </form>
                                    </td>
                            <?php
                                    $msg2 = null;
                                    if (isset($_GET['id'])) {
                                        $matiere = new Matiere();
                                        $res = $matiere->supprimerMatier($_GET['id']);

                                        if ($res == true) {
                                            $msg2 =
                                                '<div class="alert alert-success alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-smile-o"></i></strong> Suppression avec success.
                                                </div>';
                                        } else {
                                            $msg2 =
                                                '<div class="alert alert-danger alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-frown-o"></i></strong> Erreur sur suppression .
                                                </div>';
                                        }
                                        mysqli_close($con);
                                    }
                                }
                            }
                            echo $msg2;
                            ?>
                        </tr>

                    </table>

                </div>
                <div class="cart_liste">
                    <div class="carte_titr">
                        <h2>Formulaire </h2>

                    </div>
                    <hr class="separateur">
                    <div class="carte_contenue">
                        <form class="" method="POST">
                            <div class="info_pers">

                                <label for="">Nom du matière</label>
                                <label for="">Heure</label>

                                <input type="text" name="nom" placeholder="Entrer le nom du matière">
                                <input type="text" name="heure" placeholder="Heure du cours">

                                <label for="">Semèstre</label>
                                <label for="">Coefficient</label>

                                <input type="text" name="semestre" value="" placeholder="Ex: 2">
                                <input type="text" name="coeff" placeholder="Ex: 2">


                            </div>
                            <div class="info_fonction">
                                <label for="">Proffesseure résponsable du matière</label>
                                <select name="id_prof" id="">
                                    <?php
                                    $prof = new Prof();
                                    $res = $prof->afficherProf();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donne = mysqli_fetch_assoc($res)) {
                                            $id_prof = $donne['id_prof'];
                                            $nom = $donne['nom'];
                                            $prenom = $donne['prenom'];
                                    ?>
                                            <option value="<?= $id_prof ?>"><?= $id_prof . " " . $prenom ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>


                                <input name="ajouterMatiere" class="ajouter" type="submit" value="Ajouter">


                            </div>
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
                                                        <strong><i class="fa fa-thumbs-down"></i></strong> Ce matiere existe déja.
                                                    </div>';
                                    }
                                } else {
                                    $msg = '<div class="alert alert-warning alert-dismissible fade show">
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
    <script>
        // TOGGLE BAR ;
        var sidebarOuvert = false;
        var sidebar = document.getElementById("sidebar");
        var sideFermerIcon = document.getElementById("sidebarIcon");

        function sideOuvert() {
            if (!sidebarOuvert) {
                sidebar.classList.add("sidebar_responsive");
                sidebarOuvert = true;
            }
        }

        function sideFermer() {
            if (sidebarOuvert) {
                sidebar.classList.remove("sidebar_responsive");
                sidebarOuvert = false;
            }
        }

        var close = document.querySelector(".close");
    </script>

</body>
<?php include_once "_script.php" ?>


</html>