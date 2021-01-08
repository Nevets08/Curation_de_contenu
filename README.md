# Curation_de_contenu MÉMO

##Installer le projet
1. Cloner le projet
2. `composer install`
3. Copier le ficher .env.example, le renommer en .env
  3.1 Changer l'APP_URL avec https://nom_du_domaine/caracara/public
  3.2 Mettre les informations de connexion à la base de données, et faire un `php artisan config:cache`
4. Faire un `php artisan migrate`

##Autres commandes utiles
```
php artisan config:clear
php artisan cache:clear
```
