<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <div class="container-fluid ">
        <a class="navbar-brand justify-content-center fw-bold text-uppercase" href="#">Logo</a>

        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 3</a>
                </li>
                
            </ul>

        </div>
        <li class="nav-item dropdown">
            <button class="btn btn-outline-light dropdown-toggle fw-bold rounded-pill text-uppercase" style="width: 50px;" href="#" role="button" data-bs-toggle="dropdown">
            <?php
                                    $pesudo = $_SESSION['pseudo'];
                                    $char = substr($pesudo, 0, 1);
                                    echo $char;
                                    ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end mt-2">
                <li><a type="button" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-user"></i> Profiles</a></li>
                <li><button type="button" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-wrench"></i> Paramètres</button></li>
                <li><button type="button" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-envelope"></i> Message</button></li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><button type="button" class="dropdown-item btn btn-primary btn-sm"><i class="fa fa-power-off"></i> Déconnexion</button></li>
            </ul>
        </li>
        </li>




        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
