# tersea

## Technologies

Pour exécuter l'application sur votre ordinateur, vous devez d'abord installer les dépendances suivantes :

-   [PHP](https://www.php.net/manual/fr/install.php): Version 8.1.x
-   [Composer](https://getcomposer.org/download/): Version 2.x
-   [Node.js](https://nodejs.org/en/): Version 16.x
-   [Docker Desktop](https://docs.docker.com/desktop/install/windows-install/): Version 3.0.x

## Installation

**Assurez-vous que vous avez installé Docker Desktop sur votre ordinateur et que Docker est en cours d'exécution.**.
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

2. Pour tester le système de mailing lors de l'invitation d'un nouveau employé, configurez les variables suivantes en fonction des services que vous voulez utiliser :
 *https://mailtrap.io/ est une suggestion*
```env
    MAIL_MAILER=   
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
```

###  3. Installation des dépendances du projet

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

### 5. Configuration de la base de donnée

1. Pour exécuter les migrations de base de données, exécutez la commande :

```bash
    ./vendor/bin/sail artisan migrate
```
2. Pour exécuter les "seeds", c'est-à-dire les données de base de données pré-remplies de l'application, exécutez la commande suivante:

```bash
    ./vendor/bin/sail artisan db:seed
```

email: admin@tersea.com
motdepasse: tersea