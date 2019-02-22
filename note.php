<html>
<head><title>Notes du trimestre</title></head>
<body>
<?php
//Cette fonction colore en rouge les notes<10
//et en vert les notes >=15
function colore($nombre){
    if($nombre<10){
        echo'<font color="red">'.$nombre.'</font>';
    }
    elseif($nombre>=15){
        echo'<font color="green">'.$nombre.'</font>';
    }
    //cas par défaut(affiche sans modifier couleur)
    else{
        echo $nombre;
    }
}

//Construisons notre tableau de notes :
$notes=array(2,5,7,10,11,13,15,17,18);

//La boucle foreach scanne le tableau
//en appliquant la fonction colore
echo 'Vos notes du trimestre :<br/>';
foreach($notes as $note){
    echo '- ';
    colore($note);
    echo '<br/>';
}

?>
</body>
</html>