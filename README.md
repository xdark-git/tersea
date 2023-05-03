# tersea

## Technologies
**Si vous souhaitez installer le projet sur Docker, [cliquer ici](#Installation-sur-Docker)**
## Installation sur votre ordinateur
Pour exécuter l'application sur votre ordinateur, vous devez d'abord installer les dépendances suivantes :

-   [PHP](https://www.php.net/manual/fr/install.php): Version 8.1.x
-   [Composer](https://getcomposer.org/download/): Version 2.x
-   [Node.js](https://nodejs.org/en/): Version 16.x

###  1. Cloner le projet.

Ouvrez votre terminal et lancer ce commande

```bash
  git clone https://github.com/xdark-git/tersea.git
  cd tersea
```
###  2. Copie et configuration du fichier .env

1. Pour copier le fichier .env.example et le renommer en .env, exécutez la commande :

```bash
  cp .env.example .env
```
2. Configurer les variables suivant de votre .env par rapport à votre configuration base de donnée que vous souhaitez utiliser
```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
3. Pour tester le système de mailing lors de l'invitation d'un nouveau employé, configurez les variables suivantes en fonction des services que vous voulez utiliser :
 *https://mailtrap.io/ est une suggestion*
```env
    MAIL_MAILER=   
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
```
###  3. Installation les dépendances du projet

Lancer la commande suivante pour installer toutes les dépendances du projet

```bash
    composer install & npm install
```
### 4. Configuration de la base de donnée

1. Pour exécuter les migrations de base de données, exécutez la commande :

```bash
    php artisan migrate
```
2. Pour exécuter les "seeds", c'est-à-dire les données de base de données pré-remplies de l'application, exécutez la commande suivante:

```bash
    php artisan db:seed
```
### 6. Exécution les serveurs de développement

1. Exécutez la commande suivante, pour lancer le serveur node: 

```bash
    npm run dev
```

2. Ouvrer un nouveau terminal et exécuter la commande suivante pour lancer le server de développement pour laravel:

```bash
    php artisan serve
```
**Vous pouvez maintenant tester le projet [ en cliquant ici](http://127.0.0.1:8000/)**

## Installation sur Docker
Pour exécuter l'application sur un container docker, vous devez d'abord installer les dépendances suivantes :
-   [Composer](https://getcomposer.org/download/): Version 2.x
-   [Docker Desktop](https://docs.docker.com/desktop/install/windows-install/): Version 3.0.x <br />
**Assurez-vous que Docker Desktop est bien installé sur votre ordinateur et est en cours d'exécution.**.

###  1. Cloner le projet.

Ouvrez votre terminal et lancer ce commande

```bash
  git clone https://github.com/xdark-git/tersea.git
  cd tersea
```

###  2. Copie et configuration du fichier .env

1. Pour copier le fichier .env.example et le renommer en .env, exécutez la commande :

```bash
  cp .env.example .env
```
2. Remplacer les variables de configuration de la base de donnée par ce qui suit:
```env
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=tersea
    DB_USERNAME=sail
    DB_PASSWORD=password
```

3. Pour tester le système de mailing lors de l'invitation d'un nouveau employé, configurez les variables suivantes en fonction des services que vous voulez utiliser :
 *https://mailtrap.io/ est une suggestion*
```env
    MAIL_MAILER=   
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
```

###  3. Installation les dépendances du projet

Lancer la commande suivant pour installer les dépendances du projet

```bash
    composer install
```

### 4. Démarrer les containers Docker

**Assurer vous que le port 8000 et le port 3306 de votre machine ne sont pas en cours d'utilisation**

Pour démarrer les containers Docker, exécutez la commande :

```bash
    ./vendor/bin/sail up
```
**Vu que cette commande ne lance pas les containers en mode détache, je vous suggère d'ouvrir une nouvelle terminale pour compléter les étapes suivantes.**
### 5. Configuration de la base de donnée

1. Pour exécuter les migrations de base de données, exécutez la commande :

```bash
    ./vendor/bin/sail artisan migrate
```
2. Pour exécuter les "seeds", c'est-à-dire les données de base de données pré-remplies de l'application, exécutez la commande suivante:

```bash
    ./vendor/bin/sail artisan db:seed
```
### 6. Exécution du serveur node
Pour lancer npm directement dans le Docker container, exécutez la commande suivante: 

```bash
    ./vendor/bin/sail npm run dev
```
**Vous pouvez maintenant tester le projet [ en cliquant ici](http://127.0.0.1:8000/)**