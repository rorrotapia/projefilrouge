# Cheers-API

## Sommaire
* [Présentation](#présentation)
* [Technologies & Librairies](#technologies)
* [Schéma de Base de données](#schéma)
* [Argumentation](#argumentation)
* [Prérequis & installation](#prérequis)

## PrésentationLiens:
* [SiteWeb](https://cheers-app.netlify.com/)

### Groupe n°13:
* Lucas Benhayoun *(Designer)*
* Rodrigo Tapia *(Front/Backend)*
* Jeremy Schiappapietre *(Backend)*
* Guillaume Traub *(Front/Backend)*

## Technologies:
### Technologie: 
* Symfony 4.4
* MYSQL
* Composer

### Librairies et Packages:

#### API
* [ORM-Pack(Doctrine)](https://symfony.com/doc/current/doctrine.html#installing-doctrine)
* [DoctrineExtensions](https://github.com/beberlei/DoctrineExtensions)
* [Serializer](https://symfony.com/doc/current/components/serializer.html#installation)

#### Récuperations des données (scrapping)
* [Goutte](https://github.com/FriendsOfPHP/Goutte)


## Schéma
![Schema de bd, description ci-dessous](https://i.ibb.co/jHMDcT3/Untitled.png)
Notre base de données est composé de 3 tables: Bar, OpenHour,HappyHour.

Nous avons utilisé "Goutte"(scrapping) pour extraire les données des bars, horaires et happyhours. Ensuite nous avons créé des jointures des 3 tables filtré par jour actuelle. 
Nous avons créé ensuite un controller avec différentes routes permettant l'affichage des données en json qui ensuite ont été traités et convertis en geojson pour pouvoir s'en servir en front.

## Argumentation
Nous avons décidé de créer une API sans utiliser API-Plateform pour la simple raison, d'avoir plus de liberté au moment de la gestion des données et leur type d'envoi. De plus le cœur de notre projet se base sur une fonctionnalité : filtrer les résultats par différents paramètres optionnels envoyé depuis l'app, donc si on voulait utiliser API-Plateform, on allait devoir créer différents types de routes pour chaque cas possible, c'est qui veut dire avoir un code pas du tout maintenable.

Liens:
* [Link de l'API](http://cheeers-api.herokuapp.com/api/bars/)

## Prérequis

### Prerequisites
- Have **PHP 7.3** and **Composer** installed *(optionnal: install symfony (https://symfony.com/download))*
- Create a **.env.local** file => copy .env content in it => change ```DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7``` with the correct database url (**ask Guillaume if you don't have it**)

### Run in your terminal:
- $ ```composer install```
- $ ```php -S 127.0.0.1:8000 -t public``` 
or ```symfony server:start``` (if you have symfony installed)
