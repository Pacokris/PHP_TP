<?php

function premiers($nombre){
    /*Cette variable fait office de flag (voir explications plus haut)
    Ici flag est "éteint"*/

    $flag=0;

    /*Cette boucle teste toutes les valeurs inférieures à $nombre
    Pour voir si ce sont des multiples potentiels
    Donc ici, $i représente le multiple potentiel*/

    for($i=2;$i<$nombre;$i++){
        //si $nombre modulo $i égal zéro
        //revient à dire : si $i est un diviseur de $nombre
        if($nombre%$i==0){
            //initialise le verdict
            $verdict='n\'est pas premier';
            //allume le flag
            $flag=1;
            //Quitte la boucle immédiatement
            break;
        }
    }

    /*Si après la boucle entière
    Le flag est toujours éteint
    C'est un nombre premier !*/

    if ($flag==0){
        $verdict='est premier';
    }

    /*Gérer l'exception zéro
    qui est un peu un cas particulier*/

    if($nombre==0){
        $verdict='n\'est pas premier';
    }

    //renvoie le verdict en sortant de la fonction
    return $verdict;
}

/* Connect BDD */
    function connectMaBase(){
        $base = mysqli_connect('localhost', 'root', 'secuadm');
        mysqli_select_db($base, 'tp_franck') ;
    }
?>