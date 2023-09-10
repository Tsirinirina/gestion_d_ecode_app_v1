<?php
class Prof extends Utilisateur
{
    public function setTable()
    {
        return $this->table = 'proffesseur';
    }


    public function compterProf()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `id_prof` FROM `proffesseur`";
        $res = mysqli_query($con, $sql);

        return $res;
    }

    public function afficherProf()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT * FROM `proffesseur`";
        $res = mysqli_query($con, $sql);
        return $res;
    }

    public function afficherPrenomProf(int $id_prof)
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `prenom` FROM `proffesseur` WHERE `id_prof`='$id_prof' ";
        $res = mysqli_query($con, $sql);
        return $res;
    }

    public function compterIdentification()
    {

        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql1 = "SELECT * FROM `proffesseur`";
        $dernier_id = null;
        if (mysqli_query($con, $sql1)) {
            $dernier_id = mysqli_insert_id($con);
        } else {
            echo "Erreur: " . $sql1 . "<br>" . mysqli_error($con);
        }


        $res = mysqli_query($con, $sql1);

        return $res;
    }


    public function supprimerProf(int $id_matiere)
    {
        $db = new ConnectBase();


        $con = $db->getConnex();
        $msg = false;
        $sql = "DELETE FROM `proffesseur` WHERE `proffesseur`.`id_prof` = '$id_matiere' ";
        $msg = false;
        if ($res = mysqli_query($con, $sql)) {
            $msg = true;
        }
        return $msg;
    }
    public function afficherInfoProf(String $pseudo)
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT * FROM `proffesseur` WHERE `prenom` = '$pseudo' ";
        $res = mysqli_query($con, $sql);
        return $res;
    }
}
