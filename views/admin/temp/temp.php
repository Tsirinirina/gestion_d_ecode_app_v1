
<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow stycky-top">
    <a class="navbar-brand " href="#">
        <img class="logo-designe" src="img\logo1.png" alt="Logo designed by Bust">
    </a>
    <a class="navbar-brand " href="#">
        <img class="logo-ecole" src="img/ecole1.png" alt="Logo Ecole">
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menuhamburger">
        <i class="fa fa-th-list"></i>
    </button>
    <div class="collapse navbar-collapse" id="menuhamburger">
        <ul class="navbar-nav m-auto ">
            <li class="nav-item p-1" href="accueil.html"><a class=" mx-3">lien1</a></li>
            <li class="nav-item p-1" href="accueil.html"><a class=" mx-3">lien1</a></li>
            <li class="nav-item p-1" href="accueil.html"><a class=" mx-3">lien1</a></li>
            <li class="nav-item p-1" href="accueil.html"><a class=" mx-3">lien1</a></li>
        </ul>

    </div>
    <p><?php
        $pesudo = $_SESSION['pseudo'];
        $char = substr($pesudo, 0, 1);
        echo $char;
        ?>
    </p>
    <form action="" method="post">
        <button class="btn btn-light" name="deconnecter"><i class="fa fa-power-off"></i> Déconnexion </button>
        <?php
        if (isset($_POST['deconnecter'])) {
            session_destroy();
            header("Location:/gestion_d_ecole/index.php");
        }
        ?>
    </form>
</nav>









<style>
    li {
        list-style: none;
    }

    .user-text {
        color: white;
        font-weight: 800;
        text-align: center;

    }

    .user {
        width: 100px;

        display: grid;
        grid-template-columns: 1fr 1fr;

        border: 1px solid #fff;
        border-radius: 30px;
    }

    @media screen and (max-width: 480px) {
        .collapse {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

    }

    .user-text {
        border: 1px solid #fff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        display: flex;
        justify-content: center;
        place-items: center;
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow sticky-top">
    <a class="navbar-brand " href="#">
        <img class="logo-designe" src="img\logo1.png" alt="Logo designed by Bust">
    </a>
    <a class="navbar-brand " href="#">
        <img class="logo-ecole" src="img/ecole1.png" alt="Logo Ecole">
    </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menuhamburger">
        <i class="fa fa-th-list"></i>
    </button>
    <div class="collapse navbar-collapse " id="menuhamburger">
        <ul class="navbar-nav m-auto row">
            <li class="nav-item col-3"><a href="#">Dashboard</a></li>
            <li class="nav-item col-3"><a href="#">Proffesseur</a></li>
            <li class="nav-item col-3"><a href="#">Elève</a></li>
            <li class="nav-item col-3"><a href="#">Matiere</a></li>
        </ul>
        <div class="user ">
            <div class="user-text m-auto">
                <span class="">
                    <?php
                    $pesudo = $_SESSION['pseudo'];
                    $char = substr($pesudo, 0, 1);
                    echo $char;
                    ?>
                </span>
            </div>

            <form action="" method="post" class="">
                <button class="btn btn-link" name="deconnecter"><i class="fa fa-power-off"></i> </button>
                <?php
                if (isset($_POST['deconnecter'])) {
                    session_destroy();
                    header("Location:/gestion_d_ecole/index.php");
                }
                ?>
            </form>


        </div>







    </div>


</nav>




<p>ADMIN ! BIENVENUE </p> -->