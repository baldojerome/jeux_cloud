<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="author" content="Jérôme Baldo" />
        <script type="text/javascript" src="./vue/vue_javascript/notification.js"></script>
    </head>

    <body>
        <h1>Asteroide un jeu en mode "cloud native"</h1>
        <hr>
        <h2>ACCUEIL</h2>
        <hr>
        <p>L'inscription vous servira pour jouer</p>
        <p>La connexion avec votre compte enclenchera directement une partie</p>
        <p>La déconnexion arrêtera votre partie et vous raménera à la page de connexion</p>
        <hr>
        <form action="./index.php" method= "get">
            <p>Identifiant
            <input type="text" name="id" value=""></input></p>
            <p>Mot de passe 
            <input type="text" name="mdp" value=""></input></p>
            <input type="submit" name="action" value="connexion"></input>
            <input type="submit" name="action" value="inscription"></input>
        </form>
    </body>
    <script>notification(<?php echo json_encode($$key);?>);</script>
</html>
