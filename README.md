# jeux_cloud

COMMANDES  A FAIRE POUR LANCER LE DOCKER-COMPOSE
docker-compose up --build
(pour build et run le dossier)
control + c pour arreter 
l'avantage est de pouvoir bosser et de voir les modifications en direct

ACCES AU SITE 
localhost:9000/

ACCES PHPMYADMIN (persistance + modification des données)
localhost:9001/
serveur : mysql_db
name : root
mdp : root
 
POUR RESUME : 
le docker-compose charge les différents conteneurs. Pour la base de données mysql celle-ci est implémenté directement à travers phpmyadmin. On crée une base de donées avec la table et le premier jeux de données. 
