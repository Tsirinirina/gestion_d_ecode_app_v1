<?php
class Matiere
{

    private int $id_matiere;
    private String $nom_matiere;
    private int $heure;
    private int $semestre;
    private int $coeff;
    private int $id_prof;
    private function getId_matiere()
    {
        return  $this->id_matiere;
    }
    private function getNom()
    {
        return  $this->nom_matiere;
    }
    private function getHeure()
    {
        return  $this->heure;
    }
    private function getCoeff()
    {
        return  $this->heure;
    }
    private function getSemesetre()
    {
        return  $this->semestre;
    }
    private function getId_prof()
    {
        return $this->id_prof;
    }
    public function compterMatiere()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT`id_matiere` FROM `matiere`";
        $res = mysqli_query($con, $sql);

        return $res;
    }
    public function afficherMatiere()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `matiere`.*, `proffesseur`.`prenom` FROM `matiere` LEFT JOIN `proffesseur` ON `matiere`.`id_prof` = `proffesseur`.`id_prof`;";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    public function getIdMatiere()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `id_prof` FROM `matiere` ";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    public function ajouterMatiere(String $nom, int $heure, int $semestre, int  $coeff, int $id_prof)
    {
        $this->nom = $nom;
        $this->heure = $heure;
        $this->semesetre = $semestre;
        $this->coeff = $coeff;
        $this->id_prof = $id_prof;
        $db = new ConnectBase();
        $con = $db->getConnex();
        $res = false;
        $sql = "INSERT INTO `matiere`(`nom`, `heure`, `semestre`, `coef`, `id_prof`) VALUES
        ('$this->nom','$this->heure','$this->semesetre','$this->coeff','$this->id_prof')";
        if (mysqli_query($con, $sql)) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    public function supprimerMatier(int $id_matiere)
    {
        $db = new ConnectBase();


        $con = $db->getConnex();
        $msg = false;
        $sql = "DELETE FROM `matiere` WHERE `matiere`.`id_matiere` = '$id_matiere' ";
        $msg = false;
        if (mysqli_query($con, $sql)) {
            $msg = true;
        }
        return $msg;
    }

    public function matiereDeProf(int $id_prof)
    {
        $db = new ConnectBase();
        $con = $db->getConnex();

        $sql = "SELECT `id_matiere` FROM `matiere` WHERE `id_prof` = '$id_prof' ";
        $res = mysqli_query($con, $sql);
        return $res;
    }

    public function supprimerMatierDeProf(int $id_matiere, int $id_prof)
    {
        $db = new ConnectBase();


        $con = $db->getConnex();
        $msg = false;
        $sql = "DELETE FROM `matiere` WHERE `matiere`.`id_matiere` = '$id_matiere' AND `matiere`.`id_prof` = '$id_prof' ";
        $msg = false;
        if (mysqli_query($con, $sql)) {
            $msg = true;
        }
        return $msg;
    }
}
