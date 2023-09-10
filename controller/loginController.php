<?php
session_start();
if (isset($_POST['connecter'])) {

    if (empty($_POST['id']) || empty($_POST['mdp'])) {
        $msg = '<div class="alert alert-warning alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Veuillez completer les champs
    </div>';
    } else {

        $id = $_POST['id'];
        $mdp = $_POST['mdp'];
        $char = substr($id, 0, 1);
        $char = strtoupper($char);
        $prenom = null;
        //echo " identfiant = ".$id." | Premier Char = ".$char;
        switch ($char) {
            case 'A':
                $admin = new Admin();
                $msg = $admin->identification('admin', $id, $mdp);
                if ($msg) {
                    $prenom = $admin->getPrenom('admin', $id);
                    while ($i = mysqli_fetch_assoc($prenom)) {
                        $a = $i['nom'];
                        $_SESSION['pseudo'] = $a;
                    }
                    header("Location:views/admin_accueil.php");
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Erreur!</strong> Identification ou mots de passe incorrect
                    </div>';
                }
                break;
            case 'C':
                $admin = new Prof();
                $res = $admin->identification('proffesseur', $id, $mdp);
                if ($res) {
                    $prenom = $admin->getPrenom('proffesseur', $id);
                    while ($i = mysqli_fetch_assoc($prenom)) {
                        $a = $i['prenom'];
                        $_SESSION["pseudo"] = $a;
                    }
                    header("Location:views/chef_accueil.php");
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Erreur!</strong> Identifiant ou mots de passe incorrect
                    </div>';
                }
                break;
            case 'P':
                $admin = new Prof();
                $res = $admin->identification('proffesseur', $id, $mdp);
                if ($res) {
                    $prenom = $admin->getPrenom('proffesseur', $id);
                    while ($i = mysqli_fetch_assoc($prenom)) {
                        $a = $i['prenom'];
                        $_SESSION["pseudo"] = $a;
                    }
                    header("Location:views/prof_accueil.php");
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Erreur!</strong> Identifiant ou mots de passe incorrect
                    </div>';
                }
                break;
            case 'E':
                $admin = new Eleve();
                $res = $admin->identification('eleve', $id, $mdp);
                if ($res) {
                    $prenom = $admin->getPrenom('eleve', $id);
                    while ($i = mysqli_fetch_assoc($prenom)) {
                        $a = $i['prenom'];
                        $_SESSION["pseudo"] = $a;
                    }
                    header("Location:views/eleve_accueil.php");
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible mt-3">
                        <strong>Erreur!</strong> Identifiant ou mots de passe incorrect
                    </div>';
                }
                break;
            default:
                $msg = '<div class="alert alert-danger alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Erreur!</strong> Utilisateur pas trouvé
                    </div>';
                break;
        }
    }
}



