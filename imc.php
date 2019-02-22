<html>
<head><title>Votre IMC</title></head>
<body>
<h1>Déterminez votre IMC et sachez quelle est votre corpulence d'un point de vue médical</h1>
<h2>Entrez les données suivantes </h2>
<form name="formulaire" method="post" action="imc.php">
    Entrez votre prénom : <input type="text" name="prenom"/> <br/>
    Entrez votre taille (sous la forme 1.70) : <input type="float" name="taille"/> <br/>
    Entrez votre poid (en kilos) : <input type="number" name="poid"/> <br/>
    <input type="submit" name="valider" value="OK"/>
</form>
<?php
if(isset($_POST['valider'])){
    $prenom=$_POST['prenom'];
    $taille=$_POST['taille'];
    $poid=$_POST['poid'];

    $imc=$poid/($taille*$taille);

    echo 'Bonjour '.$prenom.'<br/>
            Votre IMC (indice de masse corporelle) est exactement : '.$imc.'<br/>';

    if($imc<16.5){
        $verdict='Vous êtes en anorexie';
    }
    elseif($imc>=16.5 && $imc<=18.5){
        $verdict='Vous êtes maigre';
    }
    elseif($imc>18.5 && $imc<=25){
        $verdict='Une corpulence normale';
    }
    elseif($imc>25 && $imc<=30){
        $verdict='Vous êtes en surpoid';
    }
    elseif($imc>30 && $imc<=35){
        $verdict='Vous êtes en obésité modérée';
    }
    elseif($imc>35 && $imc<=40){
        $verdict='Vous êtes en obésité sévère';
    }
    else {
        $verdict='Vous êtes en obésité morbide';
    }

    echo $verdict;
}
?>
</body>
</html>