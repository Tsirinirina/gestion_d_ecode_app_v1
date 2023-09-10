<!DOCTYPE html>
<html lang="en">
<?php

session_start();

function monAutoloader($classN)
{
    require '../models/' . $classN . '.php';
}

spl_autoload_register('monAutoloader');



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
                            <a class="nav-link active" href="admin_eleve.php" aria-current="page">Eleve</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin_matiere.php">Matiere</a>
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
                        <h2>Elève</h2>
                        <i class="fa fa-group fa-2x text-info"></i>
                    </div>
                    <table class="tableau">
                        <tr class="table_titre">
                            <td>N°</td>
                            <td>Nom</td>
                            <td>Date de naissance</td>
                            <td>email</td>
                            <td>Télephone</td>
                            <td>Niveau</td>
                            <td>Identifiant</td>
                            <td>Action</td>
                        </tr>
                        <tr class="table_contenue">

                            <?php
                            $msg2 = null;
                            $eleve = new Eleve();
                            $res = $eleve->afficherEleve();
                            if (mysqli_num_rows($res) > 0) {
                                while ($donnes = mysqli_fetch_assoc($res)) {
                                    $id_eleve = $donnes['id_eleve'];
                                    echo "<td>" . $donnes['id_eleve'] . "</td>";
                                    echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                    echo "<td>" . $donnes['date_naissance'] . "</td>";

                                    echo "<td>" . $donnes['email'] . "</td>";
                                    echo "<td>" . $donnes['tel'] . "</td>";
                                    echo "<td>" . $donnes['niveau'] . "</td>";
                                    echo "<td>" . $donnes['identifiant'] . "</td>";

                            ?>
                                    <td>
                                        <form action='' method='post' class="d-flex justify-content-around">
                                            <a class='btn btn-outline-primary mx-2' href=''><i class='fa fa-edit'></i></a>
                                            <a class='btn btn-outline-danger' href='admin_eleve.php?id=<?= $id_eleve ?>' name='supprimer'><i class='fa fa-trash'></i></a>
                                        </form>
                                    </td>
                            <?php
                                }
                            }

                            if (isset($_GET['id'])) {
                                $eleve = new Eleve();
                                $res = $eleve->supprimerEleve($_GET['id']);

                                if ($res === true) {
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

                                <label for="">Nom</label>
                                <label for="">Prenom</label>


                                <input type="text" name="nom_eleve" placeholder="Entrer le nom">
                                <input type="text" name="prenom_eleve" placeholder="Entrer le Prenom">

                                <label for="">Date de naissance</label>
                                <label for="">Lieux de naissance</label>

                                <input type="date" name="date_eleve" value="1999-01-01">
                                <input type="text" name="lieux" placeholder="Entrer le lieux'">



                            </div>
                            <div class="info_fonction">
                                <label for="">Email</label>
                                <label for="">Niveau</label>

                                <input type="email" name="email_eleve" placeholder="Entrer votre E-mail">
                                <select name="niveau" id="">
                                    <option value="L1">L1</option>
                                    <option value="L2">L2</option>
                                    <option value="L3">L2</option>
                                    <option value="Términale">Términale</option>

                                </select>

                                <input type="text" name="tel_eleve" placeholder="Entrer le numero de télephone">


                                <input name="ajouterEleve" class="ajouter" type="submit" value="Ajouter">


                            </div>
                            <?php
                            $msg = null;
                            if (isset($_POST['ajouterEleve'])) {

                                if (!empty($_POST['nom_eleve']) || !empty($_POST['prenom_eleve']) || !empty($_POST['email_eleve']) || !empty($_POST['lieux']) || !empty($_POST['tel_eleve'])) {
                                    $nom = $_POST['nom_eleve'];
                                    $prenom = $_POST['prenom_eleve'];
                                    $date = $_POST['date_eleve'];
                                    $email = $_POST['email_eleve'];

                                    $lieux = $_POST['lieux'];
                                    $tel = $_POST['tel_eleve'];
                                    $niveau = $_POST['niveau'];
                                    $mdp = md5("azerty");

                                    $auth = 4;
                                    $premier = "E-000";
                                    $eleve = new Eleve();
                                    $res = $eleve->compterIdentification();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($res)) {
                                            $id_eleve = $donnes['identifiant'];
                                        }
                                        $l = strlen($id_eleve);
                                        $dernier_nombre = substr($id_eleve, -4, $l);
                                        $dernier_nombre = $dernier_nombre + 1;
                                        $identifiant = $premier . "" . $dernier_nombre;
                                    }

                                    $user = new Utilisateur();
                                    $existe = $user->siUserExiste('eleve', $nom, $prenom);
                                    $admin = new Admin();
                                    $res = $admin->ajouterEleve($nom, $prenom, $date, $lieux, $email, $tel, $niveau, $identifiant, $mdp, $auth);
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