<?php

    require_once ('./modele/joueurModele.php');
    require_once ('./vue/Vue.php');
    
    class Controleur
    { 
        function ___construct()
        {}
        
        function test()
        {
            $joueur = new Joueur("", "");
            $tab = $joueur->DetailBase();
            return $tab;
        }

        function VerifGet()
        {         
            if($_GET == null)
            {
                $this->Init();
            }
            else
            {
                if(isset($_GET['action']))
                {
                   $this->ChoixAction(); 
                }
                if(isset($_GET['inscription']))
                {
                    $this->ChoixInscription();
                }
                if(isset($_GET['deconnexion']))
                {
                    $this->Deconnexion();
                }    
            }
        }

        function Init()
        {
            $vue = new Vue();
            $vue->display('pageAccueil.php');
        }

        function Deconnexion()
        {
            $vue = new Vue();
            $vue->assign('deconnexion', 'deconnexion');
            $vue->display('pageAccueil.php');
        }

        function ChoixInscription()
        { 
            $vue = new Vue();
            $joueur = new Joueur("", "");
            $verifInscript = true;
            $idCree = $_GET["idCree"];
            $mdpCree = $_GET["mdpCree"];

            if($idCree == null && $mdpCree == null)
            {
                $vue->assign('erreur', 'videInscription');
                $vue->display('pageInscription.php');
            }
            $tab = $joueur->VerifId($idCree);

            if($tab == null)
            {
                $joueur->CreerJoueur($idCree, $mdpCree);
                $vue->assign('OK', 'creaProfilOk');
                $vue->display('pageAccueil.php');
            }
            else
            {
                $vue->assign('erreur', 'erreurInscription');
                $vue->display('pageInscription.php');
            }
        }

        function ChoixAction()
        {
            $vue = new Vue();
            $joueur = new Joueur("", "");
            if($_GET['action'] == 'connexion')
            {
                $id = $_GET['id'];
                $mdp = $_GET['mdp'];
                if($id == null && $mdp == null)
                {
                    $vue->assign('erreur', 'videConnexion');
                    $vue->display('pageAccueil.php');                          
                }
                $tab = $joueur->VerifJoueur($id, $mdp);
                if($tab != null)
                {
                    //c'est ici que je mets mon API
                    ////////////////////////////////
                    $url = "host.docker.internal:9002/control.php";
    
                    $get = array('partie'=>'OK');
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
                    if( ! $result = curl_exec($ch))
                    {
                        trigger_error(curl_error($ch));
                    }
                    curl_close($ch);
                    
                    echo $result;            
                }
                else
                {
                    $vue->assign('erreur', 'idMdpIncorrect');
                    $vue->display('pageAccueil.php');
                }
            }
            if($_GET['action'] == 'inscription')
            {
                $vue->display('pageInscription.php');
            }
            
        }
    }
?>