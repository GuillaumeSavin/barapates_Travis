**Projet Barapates**

_Réalisé par :_

Antoine Lorenc (Structure site, full stack {front + back}, tests unitaires)
Guillaume Savin (Front end, intégration continu)
Pierre Locquet (Base de données, back end)

_Fonctionalités_
• Page "ConfirmOrder" qui permet de confirmer avec un résumé de la
commande sur un google home,
ex : http://localhost/barapates/ConfirmOrder?152334
la commande est encodé grâce aux chiffres en paramètres, ici "152334".

/!\Le captcha fonctionne uniquement en étant online, ci-dessous lien online /!\
http://barapates.fr.nf/ConfirmOrder?152334

• Interface administration "dashboard" (login : admin, mot de passe : admin) avec 
fonction de hashage BCRYPT pour une meilleur sécurité.
L'interface administration comprend ces pages :
    - Tableau de bord : visualisation commandes en cours et en attente de paiement, le plan du restaurant et chiffre d'affaire hebdomadaire.
    - Passer un commande : interface permettant à une personne connecté de passer des commandes simplement.
    - Historique : permet de consulter l'historique des commandes et éventuellement de modifier leur état.
    - Paramètres : création d'un nouvel ingrédient (legume, fromage, sauce...) et de modifier le mot de passe de connexion.
    - Déconnexion : redirection vers l'accueil et session terminé.