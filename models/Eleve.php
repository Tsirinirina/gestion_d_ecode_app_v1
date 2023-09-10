<?php
class Eleve extends Utilisateur
{
    public function setTable()
    {
        return $this->table = 'eleve';
    }
    public function compterEleve()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `id_eleve` FROM `eleve`";
        $res = mysqli_query($con, $sql);

        return $res;
    }
    public function afficherEleve()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT * FROM `eleve`";
        $res = mysqli_query($con, $sql);
        return $res;
    }

    public function compterIdentification()
    {

        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql1 = "SELECT * FROM `eleve`";
        $dernier_id = null;
        if (mysqli_query($con, $sql1)) {
            $dernier_id = mysqli_insert_id($con);
        } else {
            echo "Erreur: " . $sql1 . "<br>" . mysqli_error($con);
        }


        $res = mysqli_query($con, $sql1);

        return $res;
    }

    public function ajouterEleve(String $nom, String $prenom, String $date_naissance, String $lieux_naissance, String $email, String $tel, String $identifiant, String $mdp,  int $auth)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_naissance = $date_naissance;
        $this->lieux_naissance = $lieux_naissance;
        $this->email = $email;
        $this->tel = $tel;
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;
        $this->auth = $auth;

        $db = new ConnectBase();
        $connex = $db->getConnex();
        $msg = false;
        $sql = "INSERT INTO `eleve`(`nom`, `prenom`, `date_naissance`, `lieu_naissance`, `email`, `tel`, `niveau`, `identifiant`, `mdp`, `auth`) VALUES 
        ('$this->nom','$this->prenom','$this->date_naissance','$this->lieux_naissance','$this->email','$this->tel','$this->identifiant','$this->mdp','$this->auth')";

        if (mysqli_query($connex, $sql)) {
            $msg = true;
        } else {
            echo "Erreur sur " . $sql . "</br>" . mysqli_error($connex);
            $msg = false;
        }
        return $msg;
        mysqli_close($connex);
    }


    public function supprimerEleve(int $id_eleve)
    {
        $db = new ConnectBase();
        

        $con = $db->getConnex();
        $msg = false;
        $sql = "DELETE FROM `eleve` WHERE `eleve`.`id_eleve` = '$id_eleve' ";
        $msg = false;
        if (mysqli_query($con, $sql)) {
            $msg = true;
        }
        return $msg;
    }
}
