<?php

    class DAO
    {
        private $db;

        function __construct()
        {
            $servername = "mysql_db:3306";
            $username = "root";
            $password = "root";
            try {
                $this->db = new PDO("mysql:host=$servername;dbname=PROFIL", $username, $password);
                // set the PDO error mode to exception
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
        
        function CreerJoueur($id, $mdp)
        {
            $req1 = "INSERT INTO JOUEUR (ID, MDP) VALUES ('$id', '$mdp')";
            $this->db->query($req1);
        }

        function DetailBase() : array
        {
            $req2 = "SELECT * FROM JOUEUR" ;
            $st2 = ($this->db)->query($req2) ;
            $tab2 = $st2->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
            return $tab2;
        }
        
        function VerifJoueur($id, $mdp) : array
        {
            $req3 = "SELECT * FROM JOUEUR WHERE ID = '$id' AND MDP = '$mdp';";
            $st3 = ($this->db)->query($req3);
            $tab3 = $st3->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
            return $tab3;
        }

        function VerifId($id) : array
        {
            $req4 = "SELECT * FROM JOUEUR WHERE ID = '$id';";
            $st4 = ($this->db)->query($req4);
            $tab4 = $st4->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
            return $tab4;
        }  
    }

?>


