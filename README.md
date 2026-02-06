README – Test Technique PHP / Laravel

Ce projet est une galerie de photos utilisant l’API Unsplash :

Une grille de photos récupérées depuis l’API Unsplash.

En cliquant sur une photo, elle s’affiche en plein écran sur une route dédiée /image/{id}.

Pagination et barre de recherche incluses.

Changement de thème (clair / sombre).

Loader lors la navigation entre pages.

Installation et exécution

1 Cloner le projet
git clone https://github.com/Kissamisa/TestDernierCo.git
cd TestDernierCo/mini-projet

2 Installer les dépendances PHP et Node
composer install
npm install

3 Fichier .env

Pour faciliter l’exécution, j’ai inclus directement le fichier .env avec la clé API Unsplash.
(En pratique, on ne commit jamais le .env pour des raisons de sécurité.)

4 Lancer Vite (front)
npm run dev


Compile automatiquement les fichiers CSS et JS.

Vite est nécessaire pour que le loader, le thème et la recherche fonctionnent correctement.

5 Lancer le serveur Laravel
php artisan serve

6 Accéder à l’application
http://127.0.0.1:8000

Routes principales

/ → galerie

/image/{id} → photo en plein écran

Tests

Le projet inclut des tests pour le controller ControllerImage :

Affichage de la galerie

Affichage d’une seule image

Gestion de la pagination

Gestion de la recherche

Gestion des erreurs de l’API

php artisan test

Remarques

.env inclus pour faciliter l’exécution.

Vite est utilisé pour compiler les assets front (CSS / JS).

Les styles sont dans resources/css/app.css.

Le JS (loader, thème, clic sur photo) est dans resources/js/app.js.