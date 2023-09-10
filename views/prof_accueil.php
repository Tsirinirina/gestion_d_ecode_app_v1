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
    .main_cart {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 30px;
        margin: 10px 0;
    }

    .cart {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.302);
    }

    @media only screen and (max-width: 855px) {
        .main_cart {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            margin: 20px 0;
        }

        .cart {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 70px;
            padding: 50px;
            background: #ffffff;
            border-radius: 4px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.213);
        }
       
    }

    @media only screen and (max-width: 480px) {
        .main_cart {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            margin: 20px 0;
        }

        .cart {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 70px;
            padding: 25px;
            background: #ffffff;
            border-radius: 4px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.213);
        }

        

    }


    .cart_rese {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
        margin: 20px 0;
    }

    .res_titre>h3 {
        font-size: 30px;
        color: rgb(62, 49, 111);
        font-weight: 900;
        border-bottom: 2px solid rgba(109, 109, 109, 0.556);
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .espace_rese {
        display: flex;
        flex-direction: column;

        height: auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 4px;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.213);
    }

    .form {
        display: grid;
        grid-template-columns: 1fr;

    }


    .info_res {
        display: grid;
        grid-template-columns: 1fr 1fr 0.5fr 0.5fr 0.5fr 0.5fr;
        gap: 20px;
    }

    .confirm {
        display: flex;
        justify-content: space-between;
    }

    .label_perso {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;

    }

    .label_rese {
        display: grid;
        grid-template-columns: 1fr 1fr 0.5fr 0.5fr 0.5fr 0.5fr;
        gap: 20px;
    }

    .lable_confirm {
        display: grid;
        grid-template-columns: 0.5fr 0.5fr 4fr;
        gap: 20px;
    }

    label {
        color: #5a5d5f;
        font-size: 14px;
        font-weight: 700;
    }

    .lab_radio {
        font-size: 20px;

    }

    input[type=text],
    input[type=date],
    input[type=time],
    input[type=tel],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 12px;
        color: rgb(58, 58, 58);
        font-weight: 600;

    }

    input[type=radio] {
        width: 20px;
    }


    .cart_liste {
        display: flex;
        flex-direction: column;

        height: auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.302);
    }

    .table_titre {
        display: grid;
        grid-template-columns: 0.2fr 1.5fr 0.5fr 0.2fr 1fr;
        border-bottom: 2px solid rgba(0, 0, 0, 0.213);
        border-radius: 2px 2px 0 0;
        height: 45px;
        color: rgba(225, 222, 222, 0.905);
        padding-bottom: 12px;
        place-items: center;
        align-content: center;
        -webkit-border-radius: 2px 2px 0 0;
        -moz-border-radius: 2px 2px 0 0;
        -ms-border-radius: 2px 2px 0 0;
        -o-border-radius: 2px 2px 0 0;
    }

    .table_titre>td {
        font-size: 15px;
        font-weight: 700;
        padding-top: 20px;


    }

    .table_contenue {
        display: grid;

        grid-template-columns: 0.2fr 1.5fr 0.5fr 0.2fr 1fr;
        justify-content: center;
        align-items: center;
        align-content: center;
        text-align: center;
        font-size: 14px;

    }


    @media only screen and (max-width: 400px) {
        .table_titre {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
        }


        .table_contenue {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;

        }
        .liste_centre {
            display: grid;
            grid-template-columns: 1fr;
            
            margin: px 0;
        }
    }

    .table_contenue>td {
        color: rgb(72, 72, 72);
        margin: 10px 0 10px 0;
    }

    .carte_titr {
        display: flex;
        justify-content: space-between;
    }

    .carte_titr>h2 {
        color: rgba(22, 18, 255, 0.768);
        font-weight: 800;
        font-size: 20px;
        margin: 10px 0 10px 0;

    }

    button {
        width: 120px;
        height: 35px;
        background: #fd7e14;
        border: 0.5px solid rgba(250, 250, 250, 0.9);
        border-radius: 4px;

        color: #3d3d3d;
        font-weight: 700;
    }

    button:hover {
        background: #dddddd;
        border: 0.5px solid rgba(157, 157, 157, 0.9);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        /* Voir en premier*/
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);

    }

    .modal_conteneur {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 0px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s;
        border-radius: 4px 4px 4px 4px;
    }

    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    .modal_titre {
        padding: 20px 16px;
        background-color: #232323;
        color: #000000;
        border-radius: 2px 2px 0px 0px;

    }

    .modal_titre>h2 {
        font-size: 20px;
        color: #b8b8b8;
        font-weight: 600;
    }

    .modal_contenue {
        padding: 2px 16px 20px 16px;
    }

    .modal_pied {

        margin-top: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
    }

    .fermer {
        color: white;
        display: flex;
        float: right;
        font-size: 28px;
        font-weight: bold;

    }

    .fermer:hover,
    .fermer:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .info_pers {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;

        gap: 10px;

    }

    .info_fonction {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;

        gap: 10px;
    }

    input.ajouter {

        width: 100%;
        height: 40px;
        background: #ffc100;
        border: 0.5px solid rgba(176, 176, 176, 0.5);
        border-radius: 3px;
        margin-top: 10px;
        color: white;
        font-size: 18px;
    }

    input.ajouter:hover {
        background: rgba(78, 78, 78, 0.5);
        border: 0.5px solid #ffc100;
        color: white;

    }

    .liste_centre {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin: px 0;
    }

    @media only screen and (max-width: 850px) {
        .liste_centre {
        display: grid;
        grid-template-columns: 1fr ;
        gap: 30px;
        margin: px 0;
    }


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
</style>

<body>

    <div class="conteneure">

        <nav class="navbar">
            <div class="nav_icon" onclick="sideOuvert()">
                <i class="fa fa-bars"></i>
            </div>
            <div class="nav_gauche">
                <a href="admin_accueil.php"><img src="img\logo1.png" alt="LOGO" srcset=""></a>
            </div>
            <div class="nav_centre">
                <a href="prof_accueil.php" class="active">Tableau de Bord </a>
                <a href="prof_prof.php">Proffesseur</a>
                <a href="prof_eleve.php">Eleve</a>
                <a href="prof_matiere.php">Matiere</a>

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
                <a href="" class="nom_util">
                    <?php
                    $pesudo = $_SESSION['pseudo'];
                    $char = substr($pesudo, 0, 1);
                    echo $char;
                    ?>
                </a>

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

            <div class="main_cart">

                <div class="cart">

                    <div class="card_inner">
                        <p class="text-prim"><i class="fa fa-group fa-2x text-success"></i></p>
                        <span class="bold text-titre">
                            Proffesseur
                        </span>
                    </div>
                    <div class="card_footer">
                        <p class="text-sec"> Nombre </p>
                        <?php
                        $prof = new Prof();
                        $res = $prof->compterProf();
                        if (mysqli_num_rows($res) > 0) {
                            $i = 0;
                            while ($donnes = mysqli_fetch_assoc($res)) {
                                $i = 1 + $i;
                            }
                        }
                        ?>
                        <span class="bold text-rouge">
                            <?php echo $i ?>
                        </span>

                    </div>

                </div>


                <div class="cart">



                    <div class="card_inner">
                        <p class="text-prim"><i class="fa fa-group fa-2x text-primary"></i></p>
                        <span class="bold text-titre">
                            Elève
                        </span>
                    </div>
                    <div class="card_footer">
                        <p class="text-sec"> Nombre </p>
                        <?php
                        $prof = new Eleve();
                        $res = $prof->compterEleve();
                        if (mysqli_num_rows($res) > 0) {
                            $i = 0;
                            while ($donnes = mysqli_fetch_assoc($res)) {
                                $i = 1 + $i;
                            }
                        }
                        ?>
                        <span class="bold text-rouge">
                            <?php echo $i ?>
                        </span>

                    </div>



                </div>



                <div class="cart">

                    <div class="card_inner">
                        <p class="text-prim"><i class="fa fa-tasks fa-2x text-warning"></i></p>
                        <span class="bold text-titre">
                            Matiere
                        </span>
                    </div>
                    <div class="card_footer">
                        <p class="text-sec"> Nombre </p>
                        <?php

                        $prof = new Matiere();
                        $res = $prof->compterMatiere();
                        if (mysqli_num_rows($res) > 0) {
                            $i = 0;
                            while ($donnes = mysqli_fetch_assoc($res)) {
                                $i = 1 + $i;
                            }
                        }
                        ?>
                        <span class="bold text-rouge">
                            <?php echo $i ?>
                        </span>
                    </div>
                </div>

            </div>


            <div class="liste_centre">
                <div class="cart_liste">
                    <div class="carte_titr">
                        <h2>Proffesseur</h2>


                    </div>
                    <table class="tableau">
                        <tr class="table_titre">
                            <td>N°</td>
                            <td>Nom</td>
                            <td>Heure de travaille</td>
                            <td>Identifiant</td>
                            <td>Action</td>
                        </tr>
                        <tr class="table_contenue">
                            <style>
                                .point {
                                    background: red;
                                    width: 10px;
                                    height: 10px;
                                    border-radius: 50%;
                                }

                                .serv {
                                    font-size: 10px;
                                }
                            </style>
                            <?php
                            $msg2 = null;
                            $prof = new Prof();
                            $res = $prof->afficherProf();
                            if (mysqli_num_rows($res) > 0) {
                                while ($donnes = mysqli_fetch_assoc($res)) {
                                    $id_prof = $donnes['id_prof'];
                                    echo "<td>" . $donnes['id_prof'] . "</td>";
                                    echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                    echo "<td>" . $donnes['heure_de_trav'] . "</td>";
                                    echo "<td>" . $donnes['identifiant'] . "</td>";
                            ?>
                                    <td>
                                        <form action='' method='post'>
                                            
                                            <a class='btn btn-outline-danger' href='admin_accueil.php?id=<?= $id_prof ?> ' name='supprimer'><i class='fa fa-trash'></i></a>
                                        </form>

                                    </td>

                            <?php

                                }
                            }
                            if (isset($_GET['id'])) {
                                $prof = new Prof();
                                $res = $prof->supprimerProf($_GET['id']);

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
                        <h2>Elève</h2>
                        <!-- <button class="ajout" id="bouttonModal_Eleve">Ajouter </button> -->
                    </div>
                    <table class="tableau">
                        <tr class="table_titre">
                            <td>N°</td>
                            <td>Nom</td>
                            <td>Niveau</td>
                            <td>Identifiant</td>
                            <td>Action</td>
                        </tr>
                        <tr class="table_contenue">
                            <style>
                                .point {
                                    background: red;
                                    width: 10px;
                                    height: 10px;
                                    border-radius: 50%;
                                }

                                .serv {
                                    font-size: 10px;
                                }
                            </style>
                            <?php

                            $eleve = new Eleve();
                            $res = $eleve->afficherEleve();
                            if (mysqli_num_rows($res) > 0) {
                                while ($donnes = mysqli_fetch_assoc($res)) {
                                    $id_eleve = $donnes['id_eleve'];
                                    echo "<td>" . $donnes['id_eleve'] . "</td>";
                                    echo "<td class='fw-bold'>" . $donnes['nom'] . " " . $donnes['prenom'] . "</td>";
                                    echo "<td>" . $donnes['niveau'] . "</td>";
                                    echo "<td>" . $donnes['identifiant'] . "</td>";

                            ?>
                                    <td>
                                        <form action='' method='post'>
                                            <a class='btn btn-outline-danger' href='admin_accueil.php?id=<?= $id_eleve ?> ' name='supprimer'><i class='fa fa-trash'></i></a>
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
                            ?>
                        </tr>
                    </table>
                </div>

            </div>

            <?php include_once "modal_admin.php"; ?>

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
    </script>

</body>
<?php include_once "_script.php" ?>


</html>