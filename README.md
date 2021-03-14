# Projet tutoré - Curation de contenu

<p align="center"><img src="https://master-projet-tutore.christ.etu.mmi-unistra.fr/caracara/public/img/Logo.png" width="400"></p>



## Installation

- Clonez le projet avec ```git clone https://github.com/Nevets08/Curation_de_contenu.git```
- Installez les dépendances avec ```composer install``` et ```npm install```
- Générez la clé de sécurité ave ```php artisan key:generate```
- Dupliquez le fichier .env.exemple en .env, puis remplissez le .env avec les paramètres de votre base de données
- Dans le .env, changez le APP_URL
- Installez les migrations de la base de données avec ```php artisan migrate```
- Ajoutez un lien symbolique du dossier storage vers le dossier public ```php artisan storage:link```

## Utilisation

### Changer le css / js
Les fichiers js et css se trouvent dans le dossier ressources. 
Modifiez les, puis lancez une de ces commandes :
- ``` npm run dev ```
- ``` npm run watch ```
- ``` npm run prod ```

## Quelques commandes utiles si jamais
- ``` chmod 755 -R ```
- ``` chmod -R o+w storage ```
- ``` php artisan cache:clear ```
- ``` php artisan view:clear ```
- ``` php artisan config:clear ```
