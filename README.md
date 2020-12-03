# Groupe de studer_j

# Crowdin

## Contexte
Bla bla le projet

## Prérequis
- Docker et DockerCompose installé
- Composer installé

## Installation (mode dev)
A la racine du projet :
```bash
make install
```

## Lancer le projet
A la racine du projet :
```bash
make
```
et rendez-vous sur `http://localhost:8080`

Le code se met à jour à chaque sauvegarde de fichier car le volume est monté,
il est parfois nécessaire de mettre à jour les packages avec les commandes :
```bash
# effectue un "composer install && composer fund" dans le container php
make dinstall
# effectue un "composer update" dans le container php
make update
```