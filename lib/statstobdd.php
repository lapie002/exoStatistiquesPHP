<?php

//connection a la base de donnees
require_once("../includes/connection.php");

// les valeurs
$ip = $_SERVER["REMOTE_ADDR"];
$user_agent = $_SERVER["HTTP_USER_AGENT"];
$urlPageVisite = $_SERVER["REQUEST_URI"];
// $webbrowser = "";


/****************************/
function getOS() {
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";

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

$user_os        =   getOS();
$user_browser   =   getBrowser();

/****************************/

// // get webbrowser used by user 1er fonction remplacer par getBrowser
// if (preg_match('/MSIE/i', $os)) {
//    $webbrowser = "Internet Explorer";
// }
// if (preg_match('/Firefox/i', $os)) {
//    $webbrowser =  "FireFox";
// }
// if (preg_match('/Opera/i', $os)) {
//    $webbrowser =  "Opera";
// }
// if (stripos( $os, 'Chrome') !== false)
// {
//     $webbrowser = "Google Chrome";
// }
// elseif (stripos( $os, 'Safari') !== false)
// {
//    $webbrowser = "Safari";
// }


// On ajoute une entrée dans la table jeux_video avec une rquete preparer.
$reponse = $conn->prepare('INSERT INTO statistiques(ipInternaute, systemeExploitation, 	navigateur, urlPageVisite) VALUES(:ipInternaute, :systemeExploitation, :navigateur, :urlPageVisite)');
$reponse->execute(array(
  'ipInternaute' => $ip,
  'systemeExploitation' => $user_os,
  'navigateur' => $user_browser,
  'urlPageVisite' => $urlPageVisite
  ));

/*
// exemple avec le timestamp() mais ca marche pas

$reponse = $conn->prepare('INSERT INTO statistiques(ipInternaute, systemeExploitation, 	navigateur, urlPageVisite, dateHeureVisite) VALUES(:ipInternaute, :systemeExploitation, :navigateur, :urlPageVisite, :dateHeureVisite)');
$reponse->execute(array(
  'ipInternaute' => $ip,
  'systemeExploitation' => $os,
  'navigateur' => $os,
  'urlPageVisite' => $urlPageVisite,
  'dateHeureVisite' => 'CURRENT_TIMESTAMP()'
  ));
*/
echo "you have been hacked !!!";
 ?>
