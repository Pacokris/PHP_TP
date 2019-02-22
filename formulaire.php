<html>
<head><title>Votre IMC</title></head>
<body>
<h1>Déterminez votre IMC et sachez quelle est votre corpulence d'un point de vue médical</h1>
<h2>Entrez les données suivantes </h2>
<form name="formulaire" method="post" action="formulaire.php">
    Entrez votre prénom : <input type="text" name="prenom"/> <br/>
    Entrez votre taille (sous la forme 1.70) : <input type="text" name="taille"/> <br/>
    Entrez votre poids (en kilos) : <input type="text" name="poids"/> <br/>
    <input type="submit" name="valider" value="OK"/>
</form>
<?php
if(isset($_POST['valider'])){
    $prenom=$_POST['prenom'];
    $taille=$_POST['taille'];
    $poids=$_POST['poids'];

    $imc=$poids/($taille*$taille);

    echo'Vos données entrées : '.'<br/>';

    if(isset($_POST['valider'])){
        foreach($_POST as $index=>$valeur){
            echo '- '.$index.' : '.$valeur.'<br/>';
        }
    }

    echo 'Bonjour '.$prenom.'<br/>
            Votre IMC (indice de masse corporelle) est exactement : '.$imc.'<br/>';

    if ($imc<16.5){
        $verdict='Vous êtes en dénutrition.';
    }
    elseif ($imc<18.5){
        $verdict='Vous êtes maigre.';
    }
    elseif ($imc<25){
        $verdict='Vous avez une corpulence normale.';
    }
    elseif ($imc<30){
        $verdict='Vous êtes en surpoids.';
    }
    elseif ($imc<35){
        $verdict='Vous êtes en état d\'obésité modérée.';
    }
    elseif ($imc<40){
        $verdict='Vous êtes en état d\'obésité sévère.';
    }
    else{
        $verdict='Vous êtes en état d\'obésité massive.';
    }

    echo $verdict;
}
?>
</body>
</html>