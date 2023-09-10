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
        margin: 20px 0;
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
            padding: 25px;
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
    input[type=email],
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
        grid-template-columns: 0.2fr 2fr 1fr 1fr 1fr 1fr 1fr 1fr;
        border-bottom: 2px solid rgba(0, 0, 0, 0.213);
        background: #6c757d;
        gap: 10px;
        border-radius: 2px 2px 0 0;
        height: 45px;

        color: rgba(225, 222, 222, 0.905);

        padding-bottom: 12px;
        align-items: start;
        place-items: start;
        align-content: center;


    }

    .table_titre>td {
        font-size: 15px;
        font-weight: 700;
        padding-top: 20px;


    }

    .table_contenue>td {
        border-bottom: 2px solid rgb(200, 200, 200);
        padding-bottom: 5px;
    }

    .table_contenue {
        display: grid;
        grid-template-columns: 0.2fr 2fr 1fr 0.8fr 1fr 1fr 0.6fr 1fr;
        align-content: center;

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
        grid-template-columns: 1fr 1fr;

        gap: 10px;

    }

    .info_fonction {
        display: grid;
        grid-template-columns: 1fr 1fr;

        gap: 10px;
    }

    input.ajouter {

        width: 100%;
        height: 40px;
        background: #ffc100;
        border: 0.5px solid rgba(176, 176, 176, 0.5);
        border-radius: 3px;
        margin-top: 8px;
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
        grid-template-columns: 1fr 0.5fr;
        gap: 30px;

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

    hr.separateur {
        border-top: 3px solid #ccc;
    }
</style>

<body>

    <div class="conteneure">

        <nav class="navbar">
            <div class="nav_icon" onclick="sideOuvert()">
                <i class="fa fa-bars"></i>
            </div>
            <div class="nav_gauche">
                <img src="img\text2.png" alt="LOGO" srcset="">

            </div>
            <div class="nav_centre">
                <a href="admin_accueil.php">Tableau de Bord </a>
                <a href="admin_prof.php">Proffesseur</a>
                <a href="admin_eleve.php" class="active">Eleve</a>
                <a href="admin_matiere.php">Matiere</a>

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
                <img src="img/logo2.png" alt="">
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

                            $prof = new Eleve();
                            $res = $prof->afficherEleve();
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

                                    echo "
                                    <td>
                                    <form action='supprimer.php' method='post'>
                                        <a class='btn btn-primary' href='' ><i class='fa fa-edit'></i></a>
                                        <a class='btn btn-danger' href='admin_prof.php?id=$id_eleve ' name='supprimer'><i class='fa fa-trash'></i></a>  
                                    </form>
                                          
                                    </td>";
                                }
                            }

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


                                <input type="text" name="nom" placeholder="Entrer le nom">
                                <input type="text" name="prenom" placeholder="Entrer le Prenom">

                                <label for="">Date de naissance</label>
                                <label for="">Lieux</label>

                                <input type="date" name="date" value="1999-01-01">
                                <input type="text" name="lieux" placeholder="Entrer le lieux de naissance'">
                               


                            </div>
                            <div class="info_fonction">
                                <label for="">Email</label>
                                <label for="">Télephone</label>
                                

                                <input type="email" name="email" placeholder="Entrer votre E-mail">
                                <input type="text" name="tel" placeholder="Entrer le numero de télephone">
                                
                                <select name="niveau" id="">
                                    <option value="L1" selected>L1</option>
                                    <option value="L2" >L2</option>

                                </select>

                                <input name="ajouterEleve" class="ajouter" type="submit" value="Ajouter">


                            </div>
                            <?php

                            if (isset($_POST['ajouterEleve'])) {
                                if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['email']) || !empty($_POST['lieux']) || !empty($_POST['tel'])) {
                                    $admin = new Admin();
                                    $nom = $_POST['nom'];
                                    $prenom = $_POST['prenom'];
                                    $date = $_POST['email'];
                                    $email = $_POST['email_Prof'];
                                    $fonction = $_POST['fonction'];
                                    $lieux = $_POST['lieux'];
                                    $tel = $_POST['tel'];
                                    $mdp = md5("azerty");
                                    $premier = null;
                                    $auth = 4;
                                    
                                    $eleve = new Eleve();
                                    $res = $eleve->compterIdentification();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($res)) {
                                            $id = $donnes['identifiant'];
                                        }
                                        $l = strlen($id);
                                        $dernier_nombre = substr($id, -4, $l);
                                        $dernier_nombre = $dernier_nombre + 1;
                                        $identifiant = $premier . "" . $dernier_nombre;
                                    }
                                    $user = new Utilisateur();
                                    $existe = $user->siUserExiste('eleve', $nom, $prenom);

                                    $res = $admin->ajouterEleve($nom, $prenom, $date, $lieux, $email, $tel, $identifiant, $mdp, $auth);
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