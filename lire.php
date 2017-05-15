<?php
// 1 : on ouvre le fichier
// $monfichier = fopen('compteur.txt', 'r+');

// 2 : on lit la première ligne du fichier
// $ligne = fgets($monfichier);

if ($file = fopen("compteur.txt", "r+")) {
    while(!feof($file)) {
        $line = fgets($file);
        # do same stuff with the $line
        echo $line . "\r\n";
    }
    fclose($file);
}
else {
   // error opening the file.
   echo "erreur impression de la ligne";
}

// 3 : quand on a fini de l'utiliser, on ferme le fichier
// fclose($monfichier);

// echo $ligne;
?>
