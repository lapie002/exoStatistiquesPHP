<!--"lib" pour "librairie" > pour les fonctions. On aurait fait un répertoire "classe" pour les classes.-->
<?php
/*
$indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;

echo '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
}
echo '</table>' ;

Bloquer un visiteur importun :

<?php
// only local requests
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') die(header("Location: /"));
?>

This will direct all external traffic to your home page. Of course you could send a 404 or other custom error. Best practice is not to stay on the page with a custom error message as you acknowledge that the page does exist. That's why I redirect unwanted calls to (for example) phpmyadmin.


<!-- Consignes : Récupérer les variables suivantes et les afficher sur index.php en appelant la fonction (à créer) trackMe() :
*/
// //connection a la base de donnees
// require_once("./includes/connection.php");



function trackMe()
{
//***************TEST********************************
// Récupère l'IP de l'internaute :
echo $_SERVER["REMOTE_ADDR"] . '</br>';

// Récupère son système d'exploitation (windows, mac, linux...) et le navigateur :
echo $_SERVER["HTTP_USER_AGENT"] . '</br>';
// echo $_SERVER["SERVER_NAME"] pour le browser

// Récupère url de l'internaute, permet de savoir quelle page du site il visite :
echo $_SERVER["REQUEST_URI"] . '</br>';

// Affichez aussi la date JJ/MM/AAAA et l'heure:minute:seconde :
// On aurait pu faire echo $_SERVER["REQUEST_TIME"]
$date = date("d-m-Y");
$heure = date("H:i:s");
Print("Nous sommes le $date et il est $heure"). '</br>'. '</br>';

// On aurait pu faire $varaiables = $_SERVER["REQUEST_TIME"] . "<br />" . $_SERVER["REQUEST_TIME"] etc...
// puis faire echo $variables ;


// Autre solution plus propre :
// On créé un tableau associatif  :
$tabInternaute ['ip'] = $_SERVER["REMOTE_ADDR"];
$tabInternaute ['userAgent'] = $_SERVER["HTTP_USER_AGENT"];
$tabInternaute ['hour'] = $_SERVER["REQUEST_TIME"];
$tabInternaute ['url'] = $_SERVER["REQUEST_URI"];
$tabInternaute ['name'] = $_SERVER["SERVER_NAME"];

echo "<p>Appel de la fonction d'écrire des logs</p>";
ecrireStats($tabInternaute);
echo "<p>Fin de l'appel</p>";
}

function ecrireStats($donnees){
  echo "<p>dans la fonction d'écrire des logs </p>";
// Important : on ne peut faire un echo d'un tableau > faire un var_dump

// A faire : ouvrir un fichier en écriture
  foreach($donnees as $donnee){
// A faire : au lieu de l'echo écrire la donnée dans le fichier
    echo "<p>" . $donnee . "</p>";
  }
  // A faire : fermer le fichier
}

// function statsToBDD(){
//
//   // les valeurs
//   $ip = $_SERVER["REMOTE_ADDR"];
//   $os = $_SERVER["HTTP_USER_AGENT"];
//   $urlPageVisite = $_SERVER["REQUEST_URI"];
//
//
//   // On ajoute une entrée dans la table jeux_video avec une rquete preparer.
//   $reponse = $conn->prepare('INSERT INTO statistiques(ipInternaute, systemeExploitation, 	navigateur, urlPageVisite, dateHeureVisite) VALUES(:ipInternaute, :systemeExploitation, :navigateur, :urlPageVisite, :dateHeureVisite)');
//   $reponse->execute(array(
//   	'ipInternaute' => $ip,
//   	'systemeExploitation' => $os,
//   	'navigateur' => $os,
//   	'urlPageVisite' => $urlPageVisite,
//   	'dateHeureVisite' => 'CURRENT_TIMESTAMP()'
//   	));
// }

 ?>
