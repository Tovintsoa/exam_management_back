# Microservice - Gestion de Transactions

Une application web basée sur une architecture microservices pour la gestion CRUD (Create, Read, Update, Delete) des transactions financières.

## 📋 Table des matières

- [Technologies utilisées](#technologies-utilisées)
- [Architecture](#architecture)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Endpoints API](#endpoints-api)
- [Structure du projet](#structure-du-projet)
- [Développement](#développement)
- [Dépannage](#dépannage)
- [Contribution](#contribution)

## 🚀 Technologies utilisées

- **Backend**: PHP 8.4 avec Symfony 7.3
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