<html>
<head><title>TOUTES LES INFOS SUR LES INSCRITS DU SITE</title></head>
<body>
<?php
//On se connecte
$base = mysqli_connect('localhost', 'root', 'secuadm');
mysqli_select_db($base, 'tp_franck') ;

// On prépare la requête
$sql = 'SELECT * FROM tp_franck.utilisateurs WHERE sexe="F";';

// On lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas (or die)
$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($base));

//on organise $req en tableau associatif  $data['champ']
//en scannant chaque enregistrement récupéré
//on en profite pour gérer l'affichage

//titre de la page avant la boucle
echo'<h2>TOUTES LES FILLES INSCRITES :</h2>';

//boucle
while ($data = mysqli_fetch_array($req)) {
    // on affiche les résultats
    echo 'Pseudo : <strong>'.$data['pseudo'].'</strong><br />';
    echo 'Son âge : '.$data['age'].'<br />';
    echo 'Sa date d\'inscription : '.$data['dateInscription'].'<br /><br/>';
}
//On libère la mémoire mobilisée pour cette requête dans sql
//$data de PHP lui est toujours accessible !
mysqli_free_result ($req);

//On ferme sql
mysqli_close ($base);
?>
</body>
</html>