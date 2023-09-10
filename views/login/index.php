
<style>
    .shd {
        box-shadow: 0px 5px 5px rgba(29, 29, 29, 0.495);
    }

    .form-control {
        border-color: #1b549a9f;
    }

    .mdp {
        font-size: 12px;
        color: rgb(103, 102, 102);
    }



    .dev {
        font-size: 10px;
    }

    .txt {
        font-size: 10px;

    }

    body {
        background-image: url("views/login/img/1000.jpg");
        background-repeat: repeat;
        background-size: cover;
    }



    @media screen and (max-width: 1000px) {
        body {
            background-image: url("views/login/img/768.jpg");
            background-repeat: repeat;
            background-size: cover;
        }
    }

    @media screen and (min-width: 700px) {
        .login-form {
            margin-top: 100px;
        }

    }

    @media screen and (max-width: 400px) {
        
    }


    .login-form {
        display: grid;
        place-items: center;
        justify-content: center;
    }
    @media screen and (min-width: 700px) {
        .form {
            width: 400px;
        }
    }

    .form {
        width: 350px;
    }
</style>

<body class="bg-white">
    <div class="container ">
        <div class="row pt-5 mb-5 ">
            <div class="col-12 col-sm-12 col-md-8 col-lg-6 login-form ">
                <div class="col-10  p-3 shd rounded bg-light form">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="">
                        <div class="mb-3 mt-3">
                            <label for="identification">Identification :</label>
                            <input type="text" class="form-control" id="identification" placeholder="Code d' identification Ex: P-0251" name="id">
                        </div>
                        <div class="mb-3">
                            <label for="mdp">Mots de passe :</label>
                            <input type="password" class="form-control" id="mdp" placeholder="*******************" name="mdp" >
                        </div>
                        <p class="mdp">Si vous avez oubliez votre mots de passe. <a href="">Cliquez ici</a> </p>

                        <button type="submit" class="btn btn-primary btn-block " name="connecter">Connection</button>
                        <?php require "controller/loginController.php"; ?>
                    </form>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-8 col-lg-6 p-3">


            </div>

        </div>

    </div>


    <div class="bg-dark fixed-bottom d-flex justify-content-center place-items-center">
        <div class="row container ">
            <div class="col-7 mt-2">

                <p class="text-white txt"> <span class="font-weight-bold text-white">Projet : </span> <span class="">Géstion d'une école</span></p>
            </div>
            <div class="col-5 mt-2">
                <p class="text-white dev">Developper par RAJAONARISON Tsirinirina Patrick</p>
            </div>
        </div>
    </div>



</body>
