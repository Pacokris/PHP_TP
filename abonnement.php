<html>
<head><title> Abonnement </title></head>
<body>
<h1>Pour vous abonner :</h1>
<h2>Veuillez saisir vos données d'identité :</h2>
<form name="abonnement" method="post" action="abonnement.php">
    Veuillez saisir vos données d'identité : <input type="radio" name="civilite" value="Monsieur"/>Monsieur<input type="radio" name="civilite" value="Madame"/>Madame<input type="radio" name="civilite" value="Mademoiselle"/>Mademoiselle <br/>
    <br/>
    Nom : <input type="text" name="nom"/><br/>
    <br/>
    Prenom : <input type="text" name="prenom"/><br/>
    <br/>
    Age : <input type="number" name="age"/><br/>
    <br/>
    Adresse : <input type="text" name="adresse"/><br/>
    <br/>
    Code Postal : <input type="number" name="codePostal" maxlength="5"/><br/>
    <br/>
    Ville : <input type="text" name="ville"/><br/>
    <br/>
    Téléphone : <input type="number" name="telephone" maxlength="10"/><br/>
    <br/>
    Veuillez cocher le magazine choisi : <br/><input type="radio" name="magazine" value="J'ai la main verte"/>J'ai la main verte<br/><input type="radio" name="magazine" value="J'ai le pied marin"/>J'ai le pied marin<br/><input type="radio" name="magazine" value="J'ai l'oeil vif"/>J'ai l'oeil vif<br/><input type="radio" name="magazine" value="J'ai la rate qui se dilate"/>J'ai la rate qui se dilate<br/>
    <br/>
    <input type="submit" name="valider" value="OK"/>
</form>
<?php
if (isset ($_POST['valider'])){
    //On récupère les valeurs entrées par l'utilisateur :
    $civilite=$_POST['civilite'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $age =$_POST['age'];
    $adresse =$_POST['adresse'];
    $codePostal =$_POST['codePostal'];
    $ville =$_POST['ville'];
    $telephone =$_POST['telephone'];
    $magazine =$_POST['magazine'];

    // Récapitulatif
    echo'<h2>VOUS ETES :</h2>';
    echo $civilite.' '.$nom.' '.$prenom.'<br/><br/>
    <strong>Votre adresse :</strong><br/>'.
        $adresse.'<br/>'.
        $codePostal.' '.$ville.'<br/><br/>
    <strong>Votre numéro de téléphone : </strong>'.$telephone.'<br/><br/>';
    echo'<h2>VOUS AVEZ CHOISI DE VOUS ABONNER A;</h2>';
    echo'<h3>'.$magazine.'</h3><br/>
    <h4>Merci de vous être abonné(e) à ce magazine !</h4>';

    //On prépare la commande sql d'insertion
    $sql = 'INSERT INTO abonnes VALUES("3","'.$civilite.'","'.$nom.'","'.$prenom.'","'.$age.'","'.$adresse.'","'.$codePostal.'","'.$ville.'","'.$telephone.'","'.$magazine.'")';
    $base = mysqli_connect('localhost', 'root', 'secuadm');
    mysqli_select_db($base, 'tp_franck') ;

    /*on lance la commande (mysql_query) et au cas où,
    on rédige un petit message d'erreur si la requête ne passe pas (or die)
    (Message qui intègrera les causes d'erreur sql)*/
    mysqli_query ($base, $sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($base));

    // on ferme la connexion
    mysqli_close($base);
}
?>
</body>
</html>