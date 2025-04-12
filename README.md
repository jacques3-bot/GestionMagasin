<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### A propos de l'application en general

Mon application est formee de deux grandes tables pour stockee les donnees: (Users) pour les les iddentifiants des utilisateurs, et (Produits) pour stockee les les produit.
Concernant les produits, la table produits est composer de 7 colonnes(id_user,nom,quantitee,prix_unitaire,description,entree_sortir,etat).Pour le moment les colonne id_user et etat ne sont pas fonctionnelles et la colonne entree_sortir permet de stocker a la fois les produits rentree et les produits sorties.

### A propos des API

## API en liaison avec la table Users

Ils sont au total 6 Api:
- un pour afficher la list des utilisateurs
URL: GET/http://127.0.0.1:8000/api/users

- un pour inserer un utilisateur
URL: POST/http://127.0.0.1:8000/api/users

- un pour voir un utilisateur en particulier
URL: GET/http://127.0.0.1:8000/api/users/$id

- un pour modifier les donnees d'un utilisateur en particulier
URL: PUT/http://127.0.0.1:8000/api/users/$id

- un pour supprimer un utilisateur en particulier
URL: DELETE/http://127.0.0.1:8000/api/users/$id

- un pour connecter un utilisateur
URL: POST/http://127.0.0.1:8000/api/login


## API en liaison avec la table produits

il sont au nombre de 8 Api:

- un pour afficher la list des produits
URL: GET/http://127.0.0.1:8000/api/produits

- un pour inserer un produits
URL: POST/http://127.0.0.1:8000/api/produits

- un pour voir un utilisateur en produits
URL: GET/http://127.0.0.1:8000/api/produits/$id

- un pour modifier les donnees d'un produits en particulier
URL: PUT/http://127.0.0.1:8000/api/produits/$id

- un pour supprimer un produits en particulier
URL: DELETE/http://127.0.0.1:8000/api/produits/$id

- un pour voir les entree
URL: GET/http://127.0.0.1:8000/api/entree

- un pour voir les sorties
URL: GET/http://127.0.0.1:8000/api/sortie

- un pour voir le rest de la quantitee de chaque produit specifique
pour sa on passe le nom du produit en paramettre
URL: GET/http://127.0.0.1:8000/api/etat?nom=$nom_du_produit

