
<div class="container mt-3">

<form action="" method="POST">
    <div class="mb-3 mt-3">
        <label for="pseudo">Pseudo</label>
        <input type="txt" class="form-control" id="pseudo" placeholder="Entrer votre pseudo" name="id">
    </div>
    <div class="mb-3">
        <label for="mdp">Mots de passe</label>
        <input type="password" class="form-control" id="mdp" placeholder="***********" name="mdp">
    </div>
    <button type="submit" class="btn btn-primary" name="connecter">Connection</button>
    <?php
    
    if (isset($_POST['connecter'])) {

        $id = $_POST['id'];
        $mdp = $_POST['mdp'];
        $admin = new Admin();
        $msg = false;
        $res = $admin->identification($id, $mdp);
        if (mysqli_num_rows($res) > 0) {
            $msg = true;
        }
        var_dump($msg);
    }


    ?>
</form>
</div>



$sql = "SELECT `admin`.`auth` FROM `admin`  WHERE `identifiant` = '$this->identifiant' OR SELECT `eleve`.`auth`  FROM  `eleve` WHERE `identifiant` = '$this->identifiant' OR SELECT `proffesseur`.`auth` FROM  `proffesseur` WHERE `identifiant` = '$this->identifiant' ";




if (isset($_GET['id'])) {
    $prof = new Prof();
    $msg2 = null;
    $matiere = new Matiere();

    $res2 = $matiere->matiereDeProf($_GET['id']);
    if (mysqli_num_rows($res2) > 0) {
        while ($donne = mysqli_fetch_assoc($res2)) {
            $id_matiere = $donne['id_matiere'];
            $res2 = $matiere->supprimerMatierDeProf($id_matiere, $_GET['id']);
            $res = $prof->supprimerProf($_GET['id']);
        }
    }


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