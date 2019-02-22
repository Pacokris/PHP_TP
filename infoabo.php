<?php
/*Si user a cliqué sur retour à la page d'accueil, redirection
ATTENTION : un header location se met toujours en toute première instruction (et avant le html)
Il ne tolère pas même un return (ligne vide) auparavant...
*/
if(isset($_POST['quitter'])){
    header("location: abonnement.php");
}
//Intégrer le fichier des fonctions
$base = mysqli_connect('localhost', 'root', 'secuadm');
mysqli_select_db($base, 'tp_franck') ;

/*Gérer le problème de l'affichage dans le select de l'option sélectionnée
sinon on reste bloqué au cas women à chaque rafraîchissement de la page
même si le reste du code s'exécute parfaitement*/

//Si user a cliqué ok après avoir choisi une info
//initialise $info en fonction

if(isset($_POST['info'])){
    $info=$_POST['info'];
}

//valeur par défaut à l'arrivée

else{
    $info="women";
}

/*voir suite dans les ajouts PHP dans le select
affiche l'option selected le cas échéant*/
?>
<html>
<head><title>Information sur les abonnés</title></head>
<body>
<h1>Bonjour à l'administrateur du site</h1>
<h2>Vous souhaitez voir :</h2>
<form name="info" method="post" action="infoabo.php">
    <select name="info">
        <option value="women" <?php if($info =='women') { echo 'selected'; } ?>>Toutes les dames et demoiselles abonnées</option>
        <option value="men" <?php if($info =='men') { echo 'selected'; } ?>>Tous les messieurs abonnés</option>
        <option value="jeunes" <?php if($info =='jeunes') { echo 'selected'; } ?>>Tous les abonné(e)s de moins de 30 ans</option>
        <option value="vieux" <?php if($info =='vieux') { echo 'selected'; } ?>>Tous les abonné(e)s de 30 ans ou plus</option>
        <option value="mag" <?php if($info =='mag') { echo 'selected'; } ?>>Tous les abonné(e)s par magazine</option>
        <option value="CP" <?php if($info =='CP') { echo 'selected'; } ?>>Tous les codes postaux des abonné(e)s</option>
    </select>
    <input type="submit" name="valider" value="OK"/><br/>
    <input type="submit" name="quitter" value="Retour à la page d'accueil"/>
</form>
<?php
/*attention à la gestion des libérations de mémoire
c'est à la fin de chaque requête différente
Plusieurs peuvent donc se succéder
tandis que la connexion à la base et la déconnexion
ne se font qu'une seule fois quand la base entre ou sort du jeu*/

//Commun à n'importe quelle option

if (isset ($_POST['info'])){

    //connexion initiale de la db
    $base = mysqli_connect('localhost', 'root', 'secuadm');
    mysqli_select_db($base, 'tp_franck') ;

    //Gérer chaque choix :
    if($info=='women'){
        $sql='SELECT * from abonnes WHERE civilite="Madame" || civilite="Mademoiselle"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        while ($data = mysqli_fetch_array($req)) {
            echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
        }
        mysqli_free_result ($req);
    }
    elseif($info=='men'){
        $sql='SELECT * from abonnes WHERE civilite="Monsieur"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        while ($data = mysqli_fetch_array($req)) {
            echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
        }
        mysqli_free_result ($req);
    }
    elseif($info=='jeunes'){
        $sql='SELECT * from abonnes WHERE age<30';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        while ($data = mysqli_fetch_array($req)) {
            echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
        }
        mysqli_free_result ($req);
    }
    elseif($info=='vieux'){
        $sql='SELECT * from abonnes WHERE age>=30';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        while ($data = mysqli_fetch_array($req)) {
            echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
        }
        mysqli_free_result ($req);
    }

    /*cas particulier du mag : il s'y imbrique des conditions successives qui s'ajoutent
    (succession de simples if)
    pour afficher tous les magazines*/
    elseif($info=='mag'){
        $sql='SELECT * from abonnes WHERE magazine="oeil"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

        /*Point besoin d'afficher si personne n'est abonné à ce mag
        donc encadrer l'affichage dans condition*/

        //si requete non nulle
        if ($req!=NULL){
            echo'<h3>Liste des abonné(e)s à "J\'ai l\'oeil vif".</h3>';
            while ($data = mysqli_fetch_array($req)) {
                echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
            }
        }
        mysqli_free_result ($req);

        $sql='SELECT * from abonnes WHERE magazine="pied"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        if ($req!=NULL){
            echo'<h3>Liste des abonné(e)s à "J\'ai le pied marin".</h3>';
            while ($data = mysqli_fetch_array($req)) {
                echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
            }
        }
        mysqli_free_result ($req);

        $sql='SELECT * from abonnes WHERE magazine="main"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        if ($req!=NULL){
            echo'<h3>Liste des abonné(e)s à "J\'ai la main verte".</h3>';
            while ($data = mysqli_fetch_array($req)) {
                echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
            }
        }
        mysqli_free_result ($req);

        $sql='SELECT * from abonnes WHERE magazine="rate"';
        $req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        if ($req!=NULL){
            echo'<h3>Liste des abonné(e)s à "J\'ai la rate qui se dilate".</h3>';
            while ($data = mysqli_fetch_array($req)) {
                echo $data['civilite'].' <strong>'.$data['nom'].'</strong> '.$data['prenom'].'<br/>';
            }
        }
        mysqli_free_result ($req);
    }

    /*cas particulier du CP
    On veut juste la liste de toutes les valeurs que peut prendre ce champ
    donc pas de where restrictif*/

    elseif($info=='CP'){

        $sql='SELECT codePostal from abonnes';
        $req = mysqli_query($base,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));
        echo'<h3>Tous les codes postaux de nos abonnés</h3>';
        while ($data = mysqli_fetch_array($req)) {
            echo $data['codePostal'].'<br/>';
        }
        mysqli_free_result ($req);
    }
    else{
        echo'Vous n\'avez rien sélectionné ?';
    }
    //clôture finale de la db
    mysqli_close ($base);
}
?>
</body>
</html>