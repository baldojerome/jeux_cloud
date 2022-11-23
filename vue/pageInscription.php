<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="author" content="Jérôme Baldo" />
        <script type="text/javascript" src="./vue/vue_javascript/notification.js"></script>
    </head>

    <body>
        <hr>
        <h2>INSCRIPTION</h2>
        <hr>
        <p>L'inscription vous servira pour jouer.</p>
        <p>Il vous suffit de  compléter les champs ci-dessous.</p>
        <p>Il faut vous créer un identifiant et un mot de passe. </p>
        <hr>
        <form action="./index.php" method="get">
            <p>Identifiant
            <input type="text" name="idCree" value=""></input></p>
            <p>Mot de passe 
            <input type="text" name="mdpCree" value=""></input></p>
            <input type="submit" name="inscription" value="Valider inscription"></input>
        </form>
        <script>notification(<?php echo json_encode($$key);?>);</script>
    </body>
    
</html>