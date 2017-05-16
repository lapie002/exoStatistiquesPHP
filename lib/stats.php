<!--"lib" pour "librairie" > pour les fonctions..-->
<?php

//les variables globales:
$ip = $_SERVER["REMOTE_ADDR"];
$user_agent = $_SERVER["HTTP_USER_AGENT"];
$urlPageVisite = $_SERVER["REQUEST_URI"];

/*****************via la fonction trackMe()*******************************************************/

// function trackMe()
// {
// //***************TEST********************************//
// // Récupère l'IP de l'internaute :
// echo $_SERVER["REMOTE_ADDR"] . '</br>';
//
// // Récupère son système d'exploitation (windows, mac, linux...) et le navigateur :
// echo $_SERVER["HTTP_USER_AGENT"] . '</br>';
// // echo $_SERVER["SERVER_NAME"] pour le browser
//
// // Récupère url de l'internaute, permet de savoir quelle page du site il visite :
// echo $_SERVER["REQUEST_URI"] . '</br>';
//
// // Affichez aussi la date JJ/MM/AAAA et l'heure:minute:seconde :
// // On aurait pu faire echo $_SERVER["REQUEST_TIME"]
// $date = date("d-m-Y");
// $heure = date("H:i:s");
// Print("Nous sommes le $date et il est $heure"). '</br>'. '</br>';
//
// // On aurait pu faire $varaiables = $_SERVER["REQUEST_TIME"] . "<br />" . $_SERVER["REQUEST_TIME"] etc...
// // puis faire echo $variables ;
//
//
// // Autre solution plus propre :
// // On créé un tableau associatif  :
// $tabInternaute ['ip'] = $_SERVER["REMOTE_ADDR"];
// $tabInternaute ['userAgent'] = $_SERVER["HTTP_USER_AGENT"];
// $tabInternaute ['hour'] = $_SERVER["REQUEST_TIME"];
// $tabInternaute ['url'] = $_SERVER["REQUEST_URI"];
// $tabInternaute ['name'] = $_SERVER["SERVER_NAME"];
//
// echo "<p>Appel de la fonction d'écrire des logs</p>";
// ecrireStats($tabInternaute);
// echo "<p>Fin de l'appel</p>";
// }
//
// function ecrireStats($donnees){
//   echo "<p>dans la fonction d'écrire des logs </p>";
// // Important : on ne peut faire un echo d'un tableau > faire un var_dump
//
// // A faire : ouvrir un fichier en écriture
//   foreach($donnees as $donnee){
// // A faire : au lieu de l'echo écrire la donnée dans le fichier
//     echo "<p>" . $donnee . "</p>";
//   }
// }

/************************************************************************/
function getUserInfo(){

  global $ip;
  global $user_agent;
  global $urlPageVisite;

  $user_os        =   getOS();
  $user_browser   =   getBrowser();

  $donnees = [];

  //les variables
  $donnees['adrIP'] = $ip;
  $donnees['user_os'] = $user_os;
  $donnees['user_browser'] = $user_browser;
  $donnees['urlvisite'] = $urlPageVisite;

  return $donnees;

}

function ecrireStats($donnees){

  echo "<p>dans la fonction d'écrire des logs compteur.txt</p>";
// Important : on ne peut faire un echo d'un tableau > faire un var_dump
// A faire : ouvrir un fichier en écriture
  foreach($donnees as $donnee){
// A faire : au lieu de l'echo écrire la donnée dans le fichier
    //echo "<p>" . $donnee . "</p>";
       $stat = fopen('compteur.txt', 'a+');
       //ecrire dans le fichier
       fputs($stat, $donnee);
       fputs($stat, "\n");
       // A faire : fermer le fichier
       fclose($stat);
  }
}


/************************fnction getOS et getBrowser ****************************************************/
function getOS() {
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";

      //-------  pour le tableau /pat/i - Ignore case ---------------------//
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    //-------  pour le tableau /pat/i - Ignore case ---------------------//
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

 ?>
