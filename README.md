# GenFormBundle
GenFormBundle est bundle symfony dédié pour les utilisateurs symfony4.2 qui offre les fonctionnalités d'un générateur de formulaire en ligne.

## Installation
Télécharger le bundle depuis composer avec la commande 
```php
composer require bghanem/generate-form-bundle
```
## Configuration
* Activer le Bundle
```php
<?php
//bundles.php
return [
  Bg\GenerateFormBundle\BgGenerateFormBundle::class => ['all' => true],
..
];
```
* Ajouter le path dans le fichier routes.yaml
```php
app:
    resource: '@BgGenerateFormBundle/Controller'
    type: annotation
```
* Installer le doctrine et créer le schéma de la base de donné
```php
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```
```php
//update the mysql db-name dans .env
DATABASE_URL=mysql://root:@127.0.0.1:3306/db_generate_form
//create database
php bin/console doctrine:database:create
//update schéma 
php bin/console doctrine:schema:update --force
```
## Test de l'application
* lancer cette commande pour consulter les différentes APIs 
```php
php bin/console debug:router
```
