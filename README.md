[![Build Status](https://travis-ci.org/Tenebreizh/Project_Madera.svg?branch=master)](https://travis-ci.org/Tenebreizh/Project_Madera)
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/0b7cac7dbb2409d371e5)

# Project_Madera

PFR Cesi RIL-DEVOPS 2018/2020

## Membres:

-   Marc ROUSSEAU
-   Maxime CARDINAL
-   Nathan ROPARS
-   Thibaud PHILIPPI

---

## Installation

### Prérequis

1. [Composer](https://getcomposer.org) qui permet d'installer laravel
1. [npm](https://www.npmjs.com/get-npm) qui permet d'installer [vue.js](https://vuejs.org/)
1. [Wamp](http://www.wampserver.com/) qui sera notre serveur de développement local

### Installation Laravel

```console
$ cd Le/chemin/du/projet
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

#### Base de données

Ici on va construire la base de données

Dans un premier temps ouvrir le fichier .env.
Modifier les lignes suivantes :

```
APP_NAME=Madera
DB_DATABASE=madera
DB_USERNAME=root
```

```console
$ php artisan migrate:fresh --seed
$ php artisan passport:install --force
```

### Installation Vue.js

```console
$ npm install
$ npm run dev
```

### Lancement du serveur

Lancer WampServer

---

## Bonus

Quelque trucs non nécessaires mais qui vont faciliter le développement

### Ajout d'un virtual host

L'ajout d'un virutal host sur Wamp va permettre de raccourcir l'URL saisie dans le navigateur pour tester l'application lors du développement.

1. Démarrer Wamp.
1. Ouvrir un navigateur et aller sur cette page http://localhost/add_vhost.php ou [version française](http://localhost/add_vhost.php?lang=french).
1. Choisir un nom pour le virtual host avec un "." dedans (exemple : madera.test).
1. Saisir le chemin complet jusqu'à votre application (la récupérer depuis un explorateur).
1. Générer le virtual host.
1. Clic droit sur WampServer (Barre de notifications)
1. Clic sur "Rafraîchir"

### Extensions visual studio code

Petite liste d'extensions pratiques pour le 1. développement en Laravel

1. [Auto close tag](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-close-tag) ferme automatiquement les tag HTML et XML.
1. [dotENV](https://marketplace.visualstudio.com/items?itemName=mikestead.dotenv) ajoute la coloration syntaxique pour les fichiers .env.
1. [Html Snippets](https://marketplace.visualstudio.com/items?itemName=abusaidm.html-snippets) ajoute quelque snippets accélérant l'ajout de bloc basique en HTML.
1. [Laravel 5 Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel5-snippets) ajoute quelque snippets accélérant l'ajout de bloc basique en Laravel.
1. [Laravel Artisan](https://marketplace.visualstudio.com/items?itemName=ryannaddy.laravel-artisan) permet de controller artisan directement depuis Visual Studio Code.
1. [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade) ajoute quelque snippets accélérant l'ajout de bloc basique en Vue.js.
1. [Laravel goto view](https://marketplace.visualstudio.com/items?itemName=codingyu.laravel-goto-view) permet d'ouvrir les vue de Laravel depuis un un code qui la référence.
1. [npm Intellisense](https://marketplace.visualstudio.com/items?itemName=christian-kohler.npm-intellisense) ajoute l'autocomplétion de module npm dans des clauses "require".
1. [Open in Browser](https://marketplace.visualstudio.com/items?itemName=techer.open-in-browser) permet de lancer un prévisualisation rapide dans un navigateur.
1. [Path Intellisense](https://marketplace.visualstudio.com/items?itemName=christian-kohler.path-intellisense) ajoute l'autocomplétion de chemin de fichiers.
1. [Php Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) permet de débuguer un code php.
1. [Php Docblocker](https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker) facilite l'ajout de commentaire dans le code.
1. [Php Intellisense](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-intellisense) améliore l'autocomplétion dans le code PHP.
1. [Travis Ci Status](https://marketplace.visualstudio.com/items?itemName=felixrieseberg.vsc-travis-ci-status) affiche le status actuel de votre build travis directement dans visual studio code.
1. [Vetur](https://marketplace.visualstudio.com/items?itemName=octref.vetur) ajoute plusieurs outils pour le développement en Vue.js (coloration, snippets, vérification d'erreur, ...etc)
