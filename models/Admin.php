<?php
class Admin extends Utilisateur
{


    public function setAuth()
    {
        return $this->auth = 1;
    }
    public function setTable()
    {
        return $this->table = 'admin';
    }

    public function ajouterChef(String $nom, String $prenom, String $date_naissance, int $heure_de_trav, int $auth, String $email, String $tel, String $identifiant, String $mdp)
    {
        $nom = strtoupper($nom);
        $this->nom = $nom;
        $this->auth = $auth;
        $this->email = $email;
        $this->tel = $tel;
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;

        //$nom = $this->setNom($nom); 
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $msg = false;
        $sql = "INSERT INTO `admin`(`nom`, `auth`, `email`, `tel`, `mdp`, `identifiant`) VALUES ('$this->nom','$this->auth','$this->email','$this->tel','$this->identifiant','$this->mdp')";

        if (mysqli_query($connex, $sql)) {
            $msg = true;
        } else {
            echo "Erreur sur " . $sql . "</br>" . mysqli_error($connex);
            $msg = false;
        }
        return $msg;
        mysqli_close($connex);
    }

    public function ajouterProf(String $nom, String $prenom, String $date_naissance, int $heure_de_trav, String $email, String $tel, String $identifiant, String $mdp,  int $auth)
    {

        $nom = strtoupper($nom);
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $msg = false;
        $sql = "INSERT INTO `proffesseur`( `nom`, `prenom`, `date_naissance`, `heure_de_trav`, `email`, `tel`, `identifiant`, `mdp`, `auth`) VALUES 
        ('$nom','$prenom','$date_naissance','$heure_de_trav','$email','$tel','$identifiant','$mdp','$auth')";

        if (mysqli_query($connex, $sql)) {
            $msg = true;
        } else {
            echo "Erreur sur " . $sql . "</br>" . mysqli_error($connex);
            $msg = false;
        }
        return $msg;
        mysqli_close($connex);
    }

    public function ajouterEleve(String $nom, String $prenom, String $date, String $lieux, String $email, String $tel, String $niveau, String $identifiant, String $mdp,  int $auth)
    {

        $nom = strtoupper($nom);
        $db = new ConnectBase();
        $connex = $db->getConnex();
        $msg = false;
        $sql = "INSERT INTO `eleve`(`nom`, `prenom`, `date_naissance`, `lieu_naissance`, `email`, `tel`, `niveau`, `identifiant`, `mdp`, `auth`)  VALUES 
                                    ('$nom','$prenom','$date','$lieux','$email','$tel','$niveau','$identifiant','$mdp','$auth')";

        if (mysqli_query($connex, $sql)) {
            $msg = true;
        } else {
            echo "Erreur sur " . $sql . "</br>" . mysqli_error($connex);
            $msg = false;
        }
        return $msg;
        mysqli_close($connex);
    }
}
