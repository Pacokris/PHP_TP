<html>
<head><title>Identité</title></head>
<body>
<h1>Identité</h1>
<form name="formulaire" method="post" action="formulaire TP4.php">
    Entrez votre nom : <input type="text" name="nom"/> <br/>
    Entrez votre prénom : <input type="text" name="prenom"/> <br/>
    Entrez votre âge: <input type="text" name="age"/> <br/>
    Entrez votre ville : <input type="text" name="ville"/> <br/>
    Entrez votre activité : <input type="text" name="activite"/> <br/>
    <input type="submit" name="valider" value="OK"/>
</form>
<?php
if(isset($_POST['valider'])){
    echo '<h3>Vous venez d\'entrer : </h3>';
    foreach($_POST as $index=>$valeur){
        if ($index!='valider'){
            echo '- '.$valeur.'<br/>';
        }
    }
}
?>
</body>
</html>