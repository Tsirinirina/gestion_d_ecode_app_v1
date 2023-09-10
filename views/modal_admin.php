<div id="monModal" class="modal">

    <div class="modal_conteneur">

        <div class="modal_titre">
            <span id="fermer" class="fermer">&times;</span>
            <h2>Ajout Proffesseur</h2>

        </div>
        <form class="modal_contenue" method="POST" action="">
            <div class="info_pers">
            </div>
            <div class="info_fonction">
            </div>
        </form>
    </div>
</div>

<script>
    var modal = document.getElementById('monModal');
    var boutton = document.getElementById('bouttonModal');
    var fermer = document.getElementById('fermer');

    boutton.onclick = function() {
        modal.style.display = "block";
    }

    fermer.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<!-- 

<div id="monModal_Eleve" class="modal">

    <div class="modal_conteneur">

        <div class="modal_titre">
            <span id="fermer2" class="fermer">&times;</span>
            <h2>Ajout Elève</h2>

        </div>
        <form class="modal_contenue" method="POST" action="ajout_prof.php">
            <div class="info_pers">

                <label for="">Nom</label>
                <label for="">Prenom</label>
                <label for="">Date de naissance</label>

                <input type="text" name="nom" placeholder="Entrer le nom">
                <input type="text" name="prenom" placeholder="Entrer le Prenom">
                <input type="date" name="date">


                <label for="">Fonction</label>
                <label for="">Heure de travaille</label>
                <label for="">Télephone</label>


                <select name="fonction" id="">
                    <option value="Chef">Chef d'établissement</option>
                    <option value="Proffesseur">Proffesseur</option>
                </select>

                <input type="text" name="heure" placeholder="Entrer le numero de télephone">
                <input type="text" name="tel" placeholder="Entrer l' heure de travaille'">

                <input name="ajouter" class="ajouter" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
</div>


<script>
    var modal2 = document.getElementById('monModal_Eleve');
    var boutton2 = document.getElementById('bouttonModal_Eleve');
    var fermer2 = document.getElementById('fermer2');

    boutton2.onclick = function() {
        modal2.style.display = "block";
    }

    fermer2.onclick = function() {
        modal2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>

<div id="monModal_Modifier_Prof" class="modal">

    <div class="modal_conteneur">

        <div class="modal_titre">
            <span id="fermer3" class="fermer">&times;</span>
            <h2>Modification Proffesseur</h2>

        </div>
        <form class="modal_contenue" method="POST" action="ajout_prof.php">
            <div class="info_pers">

                <label for="">Nom</label>
                <label for="">Prenom</label>
                <label for="">Date de naissance</label>

                <input type="text" name="nom" placeholder="Entrer le nom">
                <input type="text" name="prenom" placeholder="Entrer le Prenom">
                <input type="date" name="date">


                <label for="">Fonction</label>
                <label for="">Heure de travaille</label>
                <label for="">Télephone</label>


                <select name="fonction" id="">
                    <option value="Chef">Chef d'établissement</option>
                    <option value="Proffesseur">Proffesseur</option>
                </select>

                <input type="text" name="heure" placeholder="Entrer le numero de télephone">
                <input type="text" name="tel" placeholder="Entrer l' heure de travaille'">

                <input name="modifier" class="ajouter" type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>


<script>
    var modal3 = document.getElementById('monModal_Modifier_Prof');
    var boutton3 = document.getElementById('bouttonModal_Modifier_Prof');
    var fermer3 = document.getElementById('fermer3');

    boutton3.onclick = function() {
        modal3.style.display = "block";
    }

    fermer3.onclick = function() {
        modal3.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
    }
</script> -->