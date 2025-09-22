# Gestion examen

Une application web back end pour la gestion des examens

## 📋 Table des matières

- [Technologies utilisées](#technologies-utilisées)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Utilisation](#utilisation)
- [Endpoints API](#endpoints-api)
- [Développement](#développement)
- [Contribution](#contribution)

## 🚀 Technologies utilisées

- **Backend**: PHP 8.4.12 avec Symfony  7.3.3
- **API**: API Platform
- **Base de données**: POSTGRESQL (via Docker)
- **Conteneurisation**: Docker & Docker Compose
- **Environnement**: Windows avec WSL2 (Ubuntu)
- **ORM**: Doctrine

## 📋 Prérequis

### Système
- Windows 11 avec WSL2 activé
- Ubuntu installé via WSL2
- Docker Desktop for Windows
- Docker Compose

### Logiciels
- PHP 8.4 via dockerfile
- Composer via dockerfile
- Git via dockerfile

## 🛠️ Installation

### 1. Configuration de l'environnement

Assurez-vous que Docker Desktop est installé avec l'intégration WSL2 activée :

1. Ouvrez Docker Desktop
2. Allez dans **Settings** > **Resources** > **WSL Integration**
3. Cochez la case pour votre distribution Ubuntu

### 2. Clonage du projet
# Depuis Ubuntu (WSL2)
```bash
git clone https://github.com/Tovintsoa/exam_management_back.git
 cd exam_management_back
```

### 3. Construction et démarrage des services

```bash
# Construction des images Docker
docker compose build --no-cache

# Démarrage de tous les services
docker compose up -d
```
### 4. Création fichier .env.local
Créez un fichier `.env.local`  avec vos paramètres locaux :

```env
# Database
DATABASE_URL="postgresql://tovintsoa:tovintsoa@database:5432/exam_management?serverVersion=16&charset=utf8"
```
### 5. Installation des dépendances PHP

```bash
# Accéder au répertoire du microservice via docker
 docker exec -it  exam_management_back-app-1 bash

# Installation des dépendances
composer install

# Génerer les API key 
php bin/console lexik:jwt:generate-keypair
```


### 6. Configuration de la base de données
Ensuite, lancer:
```bash
# Création de la base de données
php bin/console doctrine:database:create

# Exécution des migrations
php bin/console doctrine:migrations:migrate
```
Commande pour laner les fixtures pour avoir un user dans labase 
```bash
php bin/console doctrine:fixtures:load

```
## 💻 Utilisation

Accès à API Platform : http://exam_management.tovintsoa/api/docs
Authentification : 
 - Utilisateur : tianatovintsoa@gmail.com
 - Mot de passe : tovintsoa 


### 📡 Endpoints API

| Method | Endpoint      | Description                     |
|--------|--------------|---------------------------------|
| GET    | `/api/exams` | Retrieves the list of exams     |
| POST   | `/api/exams` | Creates a new exam              |
| POST   | `/api/auth`  | Generates a user token (login)  |

## 🔧 Développement

### Commandes utiles

```bash
# Voir les logs en temps réel
docker compose logs -f

# Exécuter des commandes dans le conteneur
docker compose exec app bash

# Générer une nouvelle entité
php bin/console make:entity

# Créer une migration
php bin/console make:migration

# Vider le cache
php bin/console cache:clear
```

## 🤝 Contribution

1. Fork le projet
2. Créez votre branche feature (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Committez vos changements (`git commit -am 'Ajout nouvelle fonctionnalité'`)
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Créez une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 👥 Auteurs

- **Tovintsoa** - Développeur principal