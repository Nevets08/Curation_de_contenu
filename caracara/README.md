#Projet tutoré - Curation de contenu

<p align="center"><img src="https://master-projet-tutore.christ.etu.mmi-unistra.fr/caracara/public/img/Logo.png" width="400"></p>



## Installation

### Base de données
- Dupliquer le fichier .env.exemple en .env
- Remplissez le .env avec les paramètres de votre base de données
- ``` php artisan migrate ```

### Installer les dépendances
- ```composer install```
- ```npm install```

### Clé d’encryption
- ```php artisan key:generate```


## Utilisation

### Changer le css / js
Les fichiers js et css se trouvent dans le dossier ressources. 
Modifiez les, puis lancer une de ces commandes :
- ``` npm run dev ```
- ``` npm run watch ```
- ``` npm run prod ```

## Quelques commandes utiles si jamais
- ``` chmod 755 -R ```
- ``` chmod -R o+w storage ```
- ``` php artisan cache:clear ```
- ``` php artisan view:clear ```
- ``` php artisan config:clear ```
