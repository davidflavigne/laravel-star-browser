### INSTALLATION
- Prérequis: php (php-curl, php-mysql), node, npm, composer up-to-date.
- Cloner le projet
```bash
git clone laravel-star-browser.git
cd laravel-star-browser
```
- Créer la base de données mysql
```sql
create database laravel;
create user laravel@localhost identified by 'password';
grant all privileges on laravel.* to laravel@localhost;
```
- Modifier la config bdd de laravel (fichier `.env`)
```
cp .env.example .env
composer install
```
- Créer les tables en bdd. Les fiches en seed ne comportent pas de photos
```bash
php artisan migrate
php artisan db:seed --class=StarSeeder
#Pour la gestion des photos
php artisan storage:link
php artisan key:generate
```
- Installation des composants node
```
npm install
```
- Lancement du serveur de développement
```bash
php artisan serve
#En parallèle dans un autre terminal
npm run dev
```
- Par défaut, le site est accessible sur `http://localhost:8000/dashboard`