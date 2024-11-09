# Basic MVC Setup

![PHP](https://img.shields.io/badge/PHP-%5E7.4%7C%5E8.0-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![AltoRouter](https://img.shields.io/badge/altorouter-%5E2.0-orange)
![Dotenv](https://img.shields.io/badge/phpdotenv-%5E5.6-lightgrey)

## Description
**Basic MVC Setup** est une structure de base pour un projet PHP suivant le modèle MVC (Modèle-Vue-Contrôleur). Ce projet a été conçu pour fournir une fondation simple, extensible et facile à utiliser pour les développeurs souhaitant travailler avec l’architecture MVC en PHP.

## Table des matières
- [Basic MVC Setup](#basic-mvc-setup)
  - [Description](#description)
  - [Table des matières](#table-des-matières)
  - [Pré-requis](#pré-requis)
  - [Installation](#installation)
  - [Structure du projet](#structure-du-projet)
  - [Structure du projet](#structure-du-projet-1)
    - [Utilisation](#utilisation)
  - [Contributeurs](#contributeurs)

## Pré-requis
- **PHP 7.4 ou supérieur**
- **Composer** (pour la gestion des dépendances)
  
Assurez-vous que votre environnement est correctement configuré pour exécuter du PHP et que Composer est installé.

## Installation
1. Clonez le dépôt :
    ```bash
    git clone https://github.com/Bfabien99/php_fast_mvc_setup.git
    cd basic_mvc_setup
    ```

2. Installez les dépendances du projet via Composer :
    ```bash
    composer install
    ```

3. Configurez vos variables d'environnement en créant un fichier `.env` à la racine du projet. Vous pouvez vous baser sur `.env.example` fourni.

## Structure du projet
Le projet est structuré en suivant le modèle MVC :
## Structure du projet
Le projet est structuré en suivant le modèle MVC :

```plaintext
├── app/                 # Contient les fichiers du contrôleur et du modèle
│   ├── Controllers/     # Contient les contrôleurs
│   └── Models/          # Contient les modèles
├── database/            # Fichiers relatifs à la base de données
├── resources/            # Fichiers relatifs à la vue
│   └── views/      # Dossier contenant les vues
├── public/              # Dossier public contenant le fichier index.php
│   └── index.php        # Point d'entrée du projet
├── storage/            # Dossier relatif au stockage
├── .env.example         # Exemple de fichier d'environnement
└── composer.json        # Fichier de configuration de Composer



### Utilisation
- **Routes** : Ce projet utilise **AltoRouter** pour la gestion des routes. Les routes sont définies dans le fichier `public/index.php`.
- **Environnement** : **phpdotenv** gère les variables d’environnement, permettant de stocker des informations sensibles comme les configurations de base de données.

## Contributeurs
- **Brou kouadio Stéphane-Fabien** - [fabienbrou99@gmail.com](mailto:fabienbrou99@gmail.com)
