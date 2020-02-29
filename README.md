# Cheers-api

## Sommaire
* [Présentation](#présentation)
* [Technologies & Librairies](#technologies)
* [Schéma de Base de données](#schéma)
* [Argumentation](#argumentation)
* [Prérequis & installation](#prérequis)

## Présentation

### Projet fil rouge - HETIC
#### Link : https://cheers-app.netlify.com/
#### Link de l'API: http://cheeers-api.herokuapp.com/api/bars/

### Team :
- Lucas Benhayoun *(Designer)*
- Rodrigo Tapia *(Front/Backend)*
- Jeremy Schiappapietre *(Backend)*
- Guillaume Traub *(Front/Backend)*

## Technologies:
### Technologie: 
-Symfony 4.4

### Librairies et Packages:
-ORM(Doctrine)

## Schéma
![Schema de bd, description ci-dessous](https://i.ibb.co/jHMDcT3/Untitled.png)

## Argumentation



## Prérequis

### Prerequisites
- Have **PHP 7.3** and **Composer** installed *(optionnal: install symfony (https://symfony.com/download))*
- Create a **.env.local** file => copy .env content in it => change ```DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7``` with the correct database url (**ask Guillaume if you don't have it**)

### Run in your terminal:
- $ ```composer install```
- $ ```php -S 127.0.0.1:8000 -t public``` 
or ```symfony server:start``` (if you have symfony installed)
