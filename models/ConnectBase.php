<?php
class ConnectBase
{

    public function getConnex()
    {

        $Host = "brlmwnlcaojokogp5i6l-mysql.services.clever-cloud.com";
        $dbname = "brlmwnlcaojokogp5i6l";
        $user = "uewfkuyvhufmbfpi";
        $password = "l2gt0Yz4Z6sq5MCApDHb";
        $Port = 3306;

        $connexion = mysqli_connect("localhost", "root",  "", "gestion_d_ecole",$Port);

        if (!$connexion) {
            die("Erreure de connection !" . mysqli_connect_error());
        }
        //echo md5("azerty");
        return $connexion;
    }
}
