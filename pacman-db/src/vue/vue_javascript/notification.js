function notification(key)
{
    if(key == 'erreurInscription')
    {
        alert("Identifiant déjà utilisé. Trouvez un autre identifiant");
    }
    else if(key == 'idMdpIncorrect')
    {
        alert("Identifiant ou/et mot de passe incorrect.");
    }
    else if(key == 'creaProfilOk')
    {
        alert("Profil créé!! Connectes-toi pour jouer!");
    }
    else if(key == 'deconnexion')
    {
        alert("Déconnexion réussie. Fin de partie");
    }
    else if(key == 'videInscription')
    {
        alert("Veuillez remplir les champs pour finaliser inscription");
    }
    else if(key == 'videConnexion')
    {
        alert("Veuillez remplir les champs pour te connecter!");
    }
    
}