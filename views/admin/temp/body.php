<style>
    .gauche {
        height: 90vh;

    }

    @media only screen and (max-width: 738px) {
        .gauche {
            height: 250px;
        }
    }
    .avatar{
        width: 100px;
        height: 100px;
    }
</style>

<div class="left col-12 col-md-1 col-lg-2">
    <div class="row ">
        <div class="col-col-lg-12">
            <div class="card gauche bg-dark">
                <div class="card-header">
                    <h4 class="text-light fw-bold text-center">ADMIN</h4>
                </div>
                <div class="card-body">
                    <div class="nav flex-column nav-pills nav-stacked" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Accueil</a>
                        <a class="nav-link" id="profes" data-toggle="pill" href="prof.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Professeur</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Matiere</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Eleve</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="center col-12 col-md-10 col-lg-9">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">


                <div class="col-lg-4 col-md-6">
                    <div class="card ">
                        <div class="card-header bg-light">
                            <strong class="card-title mb-3">Profile </strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block avatar" src="img/avatar.jpg" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">Nom utilisateur</h5>
                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i>Antananarivo, Madagascar</div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center bg-light ">
                                <a href="#"><i class="fa fa-user pr-1 text-dark"></i></a>
                                <a href="#"><i class="fa fa-facebook-square pr-1 text-dark"></i></a>
                                <a href="#"><i class="fa fa-instagram pr-1 text-dark"></i></a>
                                <a href="#"><i class="fa fa-pinterest pr-1 text-dark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


    





            </div>
        </div>
    </div>