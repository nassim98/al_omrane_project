<p align="center"><img src="public\img\logo-omrane.png"></p>


## Configuration

### fichier .env

#### base de données

Modifier les parametres de connexion au base de données :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password
```

### Preparation
#### Commandes a executer avant le lancement

Pour la configuration de Laravel
```
composer install
php artisan key:generate
php artisan config:clear
php artisan config:cache
```
Pour la configuration de VueJS  
(il faut avoir nodeJS installer sur votre machine)
```
npm install --global cross-env
npm install --no-bin-links
npm run watch
```

#### Commande pour la population de la base de données
```
php artisan migrate:fresh --seed
```

## Lancement

```
php artisan server --host=addr_host --port=port
```
