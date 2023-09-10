<?php
$msg2 = null;
                            if (isset($_POST['ajouterEleve'])) {
                                if (!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['email']) || !empty($_POST['tel']) || !empty($_POST['lieux'])) {
                                    $admin = new Admin();
                                    $nom = $_POST['nom'];
                                    $prenom = $_POST['prenom'];
                                    $date = $_POST['date'];
                                    $email = $_POST['email'];
                                    $niveau = $_POST['niveau'];
                                    $lieux = $_POST['lieux'];
                                    $tel = $_POST['tel'];
                                    $mdp = md5("azerty");
                                    $premier = null;

                                    $eleve = new Eleve();
                                    $res = $eleve->compterIdentification();
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($donnes = mysqli_fetch_assoc($res)) {
                                            $id = $donnes['identifiant'];
                                        }
                                        $l = strlen($id);
                                        $dernier_nombre = substr($id, -4, $l);
                                        $dernier_nombre = $dernier_nombre + 1;
                                        $identifiant = $premier . "" . $dernier_nombre;
                                    }
                                    $user = new Utilisateur();
                                    $existe = $user->siUserExiste('eleve', $nom, $prenom);

                                    $res = $admin->ajouterEleve($nom, $prenom, $date, $heure, $email, $tel, $identifiant, $mdp, $auth);
                                    if ($res == true) {
                                        $msg =
                                            '<div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                <strong><i class="fa fa-smile-o"></i></strong> Ajout avec success.
                                            </div>';
                                    } else {
                                        $msg = '<div class="alert alert-danger alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-frown-o"></i></strong> Erreur sur insertion.
                                                </div>';
                                    }
                                } else {
                                    $msg = '<div class="alert alert-warning alert-dismissible fade show">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                    <strong><i class="fa fa-thumbs-o-down"></i></strong> Veuillez remplir les champs.
                                                </div>';
                                }
                            }
                            echo $msg;
