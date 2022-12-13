<?php

    //echo"je suis dans le controleur du jeux";
    //var_dump($_GET);
    //if($_GET['partie'] != NULL && $_GET != NULL)
    if(isset($_GET['partie']))
    {
        require("./pageJeux.php");
    }
    if(isset($_GET["deconnexion"]))
    {
        //echo "methode pour revenir sur le précédent conteneur";
        header_remove();
        $url = "host.docker.internal:9000/";
        header('Location:http://127.0.0.0:9000/index.php');
        //il faut changer l'adresse 
        $get = array();
        $options = array();
        $data = array();
        $defaults = array(
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
        );
   
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result2 = curl_exec($ch))
        {
            trigger_error(curl_error($ch));
        }
        curl_close($ch);
        
        echo $result2;
    }
    
?>