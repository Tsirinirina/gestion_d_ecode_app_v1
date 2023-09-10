<?php

session_start();

function monAutoloader($classN)
{
    require '../models/' . $classN . '.php';
}

spl_autoload_register('monAutoloader');



include_once "_head.php";
?>

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
                                                            <strong><i class="fa fa-smile-o"></i></strong> Ajout avec succès.
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
                            <a class="nav-link active" href="admin_eleve.php" aria-current="page">Élève</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin_matiere.php">Matière</a>
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
                <?php echo $msg; ?>
            </div>
            <div>
                <h2>Élève</h2>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="datatable bg-white border rounded-5 p-2 table-responsive">
                        <table class="table  bg-white  table-sm">
                            <thead class="bg-light">
                                <tr>
                                    <td>N°</td>
                                    <td>Nom</td>
                                    <td>Née le</td>
                                    <td>Email</td>
                                    <td>Telephone</td>
                                    <td>Niveau</td>
                                    <td>Identifiant</td>
                                    <td>Action</td>
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
                                        echo "<td class='fw-bold'>" . $donnes['date_naissance'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['email'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['tel'] . "</td>";
                                        echo "<td class='fw-bold'>" . $donnes['niveau'] . "</td>";
                                        echo "<td><span class='badge rounded-pill badge-secondary'>" . $donnes['identifiant'] . "</span></td>";

                                ?>
                                        <td>
                                            <form action='' method='post' class=' d-flex flex-row'>
                                                <a class='btn btn-outline-primary  btn-sm mx-1' href='admin_accueil.php?id_modifier=<?= $id_eleve ?> ' id='bouttonModal'><i class='fa fa-edit'></i></a>
                                                <a class='btn btn-outline-danger btn-sm' href='admin_accueil.php?id=<?= $id_eleve ?> ' name='supprimer'><i class='fa fa-trash'></i></a>
                                            </form>

                                        </td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-2 bg-white border rounded-5 p-3">

                    <div class="carte_titr">
                        <h2>Formulaire </h2>
                    </div>
                    <hr class="separateur">
                    <div class="carte_contenue">
                        <form class="" method="POST">
                            <div class="info_pers">
                                <div class="mb-1">
                                    <label class="form-label">Nom</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le nom" name="nom_eleve">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le prénom" name="prenom_eleve">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control form-control-sm" placeholder="Entrez le nom" name="date_eleve" value="1999-01-01" min="1999-01-01">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Lieux</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le lieux de naissance " name="lieux">
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Entrez le lieux de naissance " name="email_eleve">
                                </div>
                            </div>
                            <div class="info_fonction">
                                <div class="mb-1">
                                    <label class="form-label">Niveau</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example" name="niveau">
                                        <option value="L1">L1</option>
                                        <option value="L2">L2</option>
                                        <option value="L3">L2</option>
                                        <option value="Terminale">Terminale</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Téléphone</label>
                                    <input type="tel" class="form-control form-control-sm" placeholder="Entrez le numero de téléphone " name="tel_eleve">
                                </div>
                                <button name="ajouterEleve" class="btn btn-primary btn-sm mt-3 w-100" type="submit">Ajouter</button>
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