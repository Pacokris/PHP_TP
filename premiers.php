<html>
<head><title>Nombres premiers</title></head>
<body>
<?php
//intègre toutes les fonctions du fichier voisin
include('fonctions.php');
//présente le formulaire
?>
<form method="POST" action="premiers.php">
    Entrez votre nombre (entre 1 et 10 000 SVP)<input type="text" name="num"/>
    <input type="submit" name="valider" value="OK"/>
</form>
<?php
//si user a cliqué OK
if(isset($_POST['valider'])){
    //récupère la valeur entrée
    $nombre=$_POST['num'];
    //convoque la fonction premiers
    $verdict=premiers($nombre);
    //affiche le verdict entier mis en forme.
    echo $nombre.' '.$verdict.'.';
}
?>
</body>
</html>