<?php

    require_once ('./modele/DAO.php');

    class Joueur{
        
        private $identifiant;
        private $motPasse;
        private $DAO;
        
        function __construct($id, $mdp)
        {
            $this->identifiant = $id;
            $this->motPasse = $mdp;
            $this->DAO = new DAO();
        }

        function DetailBase() : array
        {
           $tab = $this->DAO->DetailBase();
           return $tab;
        }

        function VerifJoueur($id, $mdp) : array
        {
            $tab = $this->DAO->VerifJoueur($id, $mdp);
            return $tab;
        }

        function VerifId($id) : array
        {
            $tab = $this->DAO->VerifId($id);
            return $tab;
        }

        function CreerJoueur($id, $mdp)
        {
            $this->DAO->CreerJoueur($id, $mdp);
        }
    }
?>