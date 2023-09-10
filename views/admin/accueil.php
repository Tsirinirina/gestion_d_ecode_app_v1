<link rel="stylesheet" href="style.css">




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
        height: 70px;
        padding: 25px;
        background: #ffffff;
        border-radius: 4px;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.213);
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

        .main_titre {
            display: grid;
            grid-template-columns: 1fr;

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

    .info_perso {
        display: grid;
        grid-template-columns: 0.5fr 1fr 0.8fr;
        gap: 20px;
    }

    .info_res {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 0.5fr 0.5fr;
        gap: 20px;
    }

    .confirm {
        display: flex;
        justify-content: space-between;
    }

    .label_perso {
        display: grid;
        grid-template-columns: 0.5fr 1fr 0.8fr;
        gap: 20px;

    }

    .label_rese {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 0.5fr 0.5fr;
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


    button {
        width: 100%;
        background-color: #2d2d3a00;
        color: rgb(0, 0, 0);
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border: 1px solid rgb(255, 255, 255);
        background: rgba(22, 18, 255, 0.768);
        border-radius: 4px;
        cursor: pointer;
        color: #ffffff;
        margin-bottom: 30px;
        font-weight: 600;
        transition: ease-in-out 0.2s;
    }
</style>
<link rel="stylesheet" href="style.css">
<div class="conteneure">
    <nav class="navbar">
        <div class="nav_icon" onclick="sideOuvert()">
            <i class="fa fa-bars"></i>
        </div>
        <div class="nav_gauche">
            <a href="index.php" class="active">Réservation </a>
            <a href="services.php">Services</a>

        </div>
        <div class="nav_droit">
            
            <form action="" method="post">
                <button class="btn btn-light" name="deconnecter"><i class="fa fa-power-off"></i> Déconnexion </button>
                <?php
                if (isset($_POST['deconnecter'])) {
                    session_destroy();
                    header("Location:/gestion_d_ecole/index.php");
                }
                ?>
            </form>
            <a href="" class="nom_util">
                <?php echo $_SESSION['pseudo']; ?>
            </a>
            <a href=""><img class="avatar" src="img/avatar.jpg" alt="" width="30px"></a>
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

        <div class="main_cart">

            <div class="cart">
                <div class="etoil">
                    <i class="fa fa-star fa-2x text-bleu"></i>
                    <i class="fa fa-star fa-2x text-bleu"></i>
                    <i class="fa fa-star-half-empty fa-2x text-bleu"></i>
                    <i class="fa fa-star-half-empty fa-2x text-bleu"></i>
                    <i class="fa fa-star-half-empty fa-2x text-bleu"></i>
                </div>
                <div class="card_inner">
                    <p class="text-prim">Chambres Simples</p>
                    <span class="bold text-titre"><?php echo $chambre_simple ?></span>
                </div>
                <div class="card_footer">
                    <p class="text-sec"> Disponibles</p>


                    <span class="bold text-rouge"><?php echo $nom ?></span>

                </div>

            </div>


            <div class="cart">
                <div class="etoil">
                    <i class="fa fa-star fa-2x text-rouge"></i>
                    <i class="fa fa-star fa-2x text-rouge"></i>
                    <i class="fa fa-star fa-2x text-rouge"></i>
                    <i class="fa fa-star-half-empty fa-2x text-rouge"></i>
                    <i class="fa fa-star-half-empty fa-2x text-rouge"></i>
                </div>
                <div class="card_inner">
                    <p class="text-prim">Chambres Luxe</p>
                    <span class="bold text-titre"><?php echo $chambre_luxe ?></span>
                </div>
                <div class="card_footer">
                    <p class="text-sec"> Disponibles</p>

                    <?php
                    $selection4 = "SELECT * FROM info_chambre";
                    $resultat4 = mysqli_query($connexion, $selection4);
                    while ($donne1 = mysqli_fetch_assoc($resultat4)) {
                        $nom = $donne1['nom'];
                        $occupant = $donne1['occupant'];
                        $status = $donne1['status'];
                        $s = "Occuppe";
                        $luxe_dispo = 0;
                        $nbr = 0;
                        $id_type = $donne1['id_type'];
                        if ($id_type == 2) {
                            $ld = 15;
                            if ($status == $s) {
                                $nbr = $nbr + 1;
                                $luxe_dispo = $luxe_dispo - $nbr;
                                $ld = $luxe_dispo + 20;
                            }
                        }
                    }
                    ?>

                    <span class="bold text-rouge"><?php echo $ld ?></span>

                </div>
            </div>


            <div class="cart">
                <div class="etoil">
                    <i class="fa fa-star fa-2x text-jaune"></i>
                    <i class="fa fa-star fa-2x text-jaune"></i>
                    <i class="fa fa-star fa-2x text-jaune"></i>
                    <i class="fa fa-star fa-2x text-jaune"></i>
                    <i class="fa fa-star fa-2x text-jaune"></i>

                </div>
                <div class="card_inner">
                    <p class="text-prim">Chambres VIP</p>
                    <span class="bold text-titre"><?php echo $chambre_vip ?></span>
                </div>
                <div class="card_footer">
                    <p class="text-sec"> Disponibles</p>

                    <?php
                    $selection4 = "SELECT * FROM info_chambre";
                    $resultat4 = mysqli_query($connexion, $selection4);
                    while ($donne1 = mysqli_fetch_assoc($resultat4)) {
                        $nom = $donne1['nom'];
                        $occupant = $donne1['occupant'];
                        $status = $donne1['status'];
                        $s = "Occuppe";
                        $vip_dispo = 0;
                        $nbr = 0;
                        $id_type = $donne1['id_type'];
                        if ($id_type == 3) {
                            $vd = 5;
                            if ($status == $s) {
                                $nbr = $nbr + 1;
                                $vip_dispo = $vip_dispo - $nbr;
                                $vd = $vip_dispo + 20;
                            }
                        }
                    }
                    ?>
                    <span class="bold text-rouge"><?php echo $vd ?></span>
                </div>
            </div>


        </div>

        <div class="cart_rese">
            <div class="espace_rese">
                <div class="res_titre">
                    <h3>RESERVATION</h3>
                </div>

                <form action="reservation.php" method="POST" class="form">
                    <div class="label_perso">
                        <label for="">Titre</label>
                        <label for="">Nom de l'hôte</label>
                        <label for="">Mobile</label>

                    </div>
                    <div class="info_perso">
                        <select name="titre" id="" required>
                            <option value="Mr">Mr</option>
                            <option value="Mme">Mme</option>
                            <option value="Mlle">Mlle</option>
                            <option value="Dr">Dr</option>
                        </select>
                        <input type="text" required name="nom">
                        <input type="text" required name="mobile">

                    </div>
                    <div class="label_rese">
                        <label for="">Type de chambre</label>
                        <label for="">Début du séjour</label>
                        <label for="">Fin du séjour</label>

                        <label>Payé</label>
                        <label>Non-Payé</label>
                    </div>
                    <div class="info_res">
                        <select name="type_chambre" required>
                            <option value="Chambre Simple">Chambre Simple</option>
                            <option value="Chambre Luxe">Chambre Luxe</option>
                            <option value="Chambre VIP">Chambre VIP</option>
                        </select>
                        <input type="date" required id="date_debut" name="date_maintenant">
                        <input type="date" required id="date_fin" name="date_fin">

                        <input type="radio" name="payement">
                        <input type="radio" name="payement" value="Non_Paye" checked="checked">
                    </div>

                    <div class="confirm">


                        <button type="valider" name="valider">Confirmer</button>

                    </div>
                    <p id="affich_erreur"></p>

                </form>

            </div>
        </div>


    </main>

    <div id="sidebar">
        <div class="sidebar_titre">
            <div class="sidebar_img">
                <img class="titre_img" src="img/logo3.png" alt="">

            </div>
            <i class="fa fa-times" id="sidebarIcon" onclick="sideFermer()"></i>
        </div>

        <div class="sidebar_menu">
            <div class="side_link">
                <i class="fa fa-dashboard">

                </i>
                <a href="diagramme.php">Tableau de Bord</a>
            </div>

            <div class="side_link">
                <div class="fa fa-building-o"></div>
                <a href="chambres.php">Chambres </a>
            </div>
            <div class="side_link">
                <div class="fa fa-list"></div>
                <a href="clients.php">Clients </a>
            </div>
            <div class="side_link">
                <div class="fa fa-group"></div>
                <a href="employes.php">Employée </a>
            </div>


            <div class="side_link">
                <div class="fa fa-money"></div>
                <a href="payements.php">Payement </a>
            </div>

            <div class="side_logout">
                <div class="fa fa-power-off"></div>
                <a href="deconnexion.php">Deconnexion </a>
            </div>


        </div>
    </div>
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