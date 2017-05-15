<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Statistiques</title>
  </head>
  <body>
    <h1>les donnes via la fonction trackMe()</h1>
    <?php
    //connection a la base de donnees
    // require_once("includes/connection.php");

    // différence include / require_once : include > le fichier continu de s'exécuter tandis que require_once est obligatoire (ex : si on veut obliger l'internaute à s'authentifier)
    include_once("lib/stats.php");

    // On appelle la fonction trackMe qu'on a créé dans stats.php
    // trackMe();

    $donnees = getUserInfo();

    ecrireStats($donnees);

     ?>
     
    <h1>Insertion dans la BDD</h1>

    <p>Server log analytics provides companies and organisations with all the features of the Javascript tracking code method, but with a higher level of security and feasibility. It can be used for all kinds of purposes – from web analytics to intranet analytics, and even CRM and other platform-based analytics.</p>

  </body>
</html>
