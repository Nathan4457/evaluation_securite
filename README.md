Logiciels à utiliser :
- Editeur de code (Visual Studio Code, Notepadd++, etc)
- Interpréteur de scripts PHP et MySQL (Wampserver, Laragon, etc) 

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Principe de l'application : 

L'application consiste à enregistrer un utilisateur dans une base de données depuis un formulaire, puis lui permettre de se connecter en vérifiant
que toutes les informations saisies correspondent à celles enregistrées dans la base de données. L'utilisateur pourra naviguer avec le statut "connecté" grâce 
à la fonction session_start(). Il pourra également Poster un article de blog si il est connecté. Enfin, l'utilisateur pourra se déconnecter et cela fermera la session.


Etapes pour installer les fichiers :

1. Télécharger le code source
2. Aller dans le répertoire où le code s'est téléchargé puis le dézipper
3. Déplacer le dossier téléchargé dans un dossier pris en compte par l'interpréteur de scripts PHP et MySQL ("C:\wamp64\www" pour Wampserver)
4. Ouvrir un éditeur de code
5. Dans l'éditeur de code, ouvrir le dossier qui contient le code source
6. Exécuter l'interpréteur de scripts PHP et Mysql (Appuyer sur la touche "Windows" puis chercher Wampserver et faire "entrer")
7. Dans le navigateur, se rendre à l'adresse suivante : http://localhost/phpmyadmin/
9. Faire "connexion" directement puis cliquer sur "importer", "parcourir", choisir le fichier SQL puis faire "enregistrer" en bas de la page. Vous devriez voir la base de données apparaître.
8. Entrer localhost/ suivi du nom du dossier où se trouve le dossier "evaluation_securite"
9. Cliquer sur le dossier "evaluation_securite" et vous devriez être sur le site 

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Version : 

PHP 8.0.26 ;
MySQL 8.0.31 ;
PhpMyAdmin 5.2.0 ;


