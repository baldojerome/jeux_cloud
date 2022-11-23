<?php
    require_once ('../modele/DAO.php');

    var_dump("je teste la gestion de la BD");
    echo "</br>";

    $dbopen = new DAO();
    $id = 'jerome';
    $mdp = 1111;
    $dbopen->CreerJoueur($id, $mdp);
    
    $tab = $dbopen->DetailBase();

    echo "premiere visualisation";
    echo "</br>";
    var_dump($tab);
    echo "</br>";
    echo "</br>";
    $tab = $dbopen->VerifJoueur($id, $mdp);
    if(isset($tab))
    {
        echo " connexion OK";
    }
    else
    {
        echo "connexion KO";
    }

    $tab = $dbopen->VerifId($id);
    if(isset($tab))
    {
        echo "identifiant déjà pris";  
    }
    else
    {
        echo "identifiant ok";
    }

?>