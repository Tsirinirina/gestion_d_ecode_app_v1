<?php
class Utilisateur
{
    private int $id;
    private String $nom;
    private String $prenom;
    private String $date_naissance;
    private int $heure_de_trav;
    private int $auth;
    private String $email;
    private String $mdp;
    private String $tel;
    private String $identifiant;
    private String $table;
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getDateNaiss()
    {
        return $this->date_naissance;
    }
    public function getheure()
    {
        return $this->heure_de_trav;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function getIdentifiant()
    {
        return $this->identifiant;
    }
    public function getMdp()
    {
        return $this->mdp;
    }
    public function setTable()
    {
        return $this->table = '$table';
    }
    public function getPrenom(String $table, String $identifiant)
    {
        $this->table = $table;
        $this->identifiant = $identifiant;
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $sql = "SELECT * FROM `$table` WHERE `identifiant` = '$this->identifiant' ";
        $res = mysqli_query($connex, $sql);
        return $res;
    }
    public function getAuthUser(String $table)
    {
        $this->table = $table;
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `auth` FROM `$this->setTable` ";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    public function getAuthProf()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `auth` FROM `$this->setTable` ";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    public function getAuthEleve()
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT `auth` FROM `$this->setTable` ";
        $res = mysqli_query($con, $sql);
        return $res;
    }
    public function UserExiste(String $identifiant)
    {
        $this->identifiant = $identifiant;
        $db = new ConnectBase();
        $connex = $db->getConnex();
    }


    public function identification(String $class, String $identifiant, String $mdp)
    {
        $this->class = $class;
        $this->identifiant = $identifiant;
        $this->mdp = md5($mdp);
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $msg = false;
        $sql = "SELECT * FROM `$class` WHERE `identifiant`='$this->identifiant' AND `mdp`='$this->mdp' ";
        $resultat = mysqli_query($connex, $sql);
        if (mysqli_num_rows($resultat) > 0) {
            $msg = true;
        } else {
            $msg = false;
        }
        return $msg;
    }
    public function getIdentification()
    {
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $sql = "SELECT `admin`.`*`, `eleve`.`*`, `proffesseur`.`*` FROM `admin` , `eleve` , `proffesseur`";
        $resultat = mysqli_query($connex, $sql);

        return $resultat;
    }

    public function existeOuPas(String $table, String $nom)
    {
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $sql = "SELECT * FROM `$table`";
        $resultat = mysqli_query($connex, $sql);

        return $resultat;
    }

    public function supprimer(String $table,int $colonne, int $id)
    {
        $db = new ConnectBase();
        $con = $db->getConnex();
        $msg = false;
        $sql = "DELETE FROM `$table` WHERE `$colonne` = '$id' ";

        if (mysqli_query($con, $sql)) {
            $msg = true;
        } else {
            $msg = false;
        }
        return $msg;
    }
    public function siExiste(String $table, String $nom)
    {
        $this->table = $table;
        $this->nom = $nom;
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT * FROM `$table` WHERE `nom` = '$nom' ";
        $msg = false;
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $msg = true;
        }
        return $msg;
    }
    public function siUserExiste(String $table, String $nom,String $prenom)
    {
        $this->table = $table;
        $this->nom = $nom;
        $db = new ConnectBase();
        $con = $db->getConnex();
        $sql = "SELECT * FROM `$table` WHERE `nom` = '$nom' AND `prenom` = '$prenom'  ";
        $msg = false;
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $msg = true;
        }
        return $msg;
    }

    public function recherche(String $mots){
        $db = new ConnectBase();
        $con =  $db->getConnex();
        $sql = " SELECT * FROM `proffesseur` WHERE `id_prof` LIKE '%$mots%' OR  `nom` LIKE '%$mots%' OR `prenom`LIKE '%$mots%' OR  `heure_de_trav` LIKE '%$mots%' OR `email` LIKE '%$mots%' OR  `tel` LIKE '%$mots%' OR  `identifiant`LIKE '%$mots%' " ;
        $res = mysqli_query($con,$sql);
        return $res;
    }
}

