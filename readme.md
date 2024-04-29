# Application Zoo Arcadia

Cette application web est conçue pour le zoo Arcadia, situé en France près de la forêt de Brocéliande, en Bretagne. Elle permet aux visiteurs de visualiser les animaux, leurs habitats, les services disponibles et les horaires du zoo. L'application met en avant les valeurs écologiques du zoo et sa gestion responsable des ressources.

## Configuration requise

Avant de commencer, assurez-vous d'avoir installé les logiciels suivants sur votre machine :

- [Mamp](https://www.mamp.info/)
- [Composer](https://getcomposer.org/) (Sur Mac : `brew install composer`)
- [MongoDB](https://www.mongodb.com/) (Sur Mac : `brew tap mongodb/brew && brew install mongodb-community`)
- [Extension PHP MongoDB](https://www.php.net/manual/en/mongodb.installation.pecl.php) (Sur Mac : `pecl install mongodb`)

## Installation et déploiement

Suivez les étapes ci-dessous pour installer et déployer l'application localement :

1. Configurez Mamp sur votre machine et assurez-vous que les serveurs MySQL et Apache sont en cours   d'exécution.

2. Dans votre fichier de configuration Apache (habituellement `httpd.conf` ou `httpd-vhosts.conf`), ajoutez ou modifiez une directive DocumentRoot pour qu'elle pointe vers le dossier public de votre application Laravel.

3. Clonez ce dépôt GitHub dans le fichier `htdocs` (MAMP) en utilisant la commande suivante :

   ```bash
   git clone https://github.com/MickaelGP/Arcadia_Ecf_Studi.git
    ```

4. Naviguez jusqu'au répertoire de l'application et installez les dépendances PHP en exécutant la commande suivante :
    ```bash
    cd Arcadia_Ecf_Studi
    composer install
    ```

5. Importez le fichier SQL fourni (arcadia_db.sql) dans votre gestionnaire de base de données MySQL pour créer les tables nécessaires à l'application.

6. Activez l'extension PHP pour MongoDB en suivant les instructions fournies dans la documentation officielle.

7. Copiez le fichier `.env.example` et renommez-le en `.env`. Modifiez ce fichier pour y inclure les informations de connexion à votre base de données MySQL et MongoDB.
    ```bash
    cp .env.example .env
    ```

8. Générez une nouvelle clé d'application Laravel en exécutant la commande suivante :

    ```bash
    php artisan key:generate
    ```

9. Importez le fichier SQL fourni  (`arcadia.sql`) dans votre gestionnaire de base de données MySQL pour créer les tables nécessaires à l'application. Vous pouvez utiliser phpMyAdmin.


10. Effectuez la commande suivante pour créer le lien symbolique du répertoire storage et pouvoir ajouter les images.
    ```bash
    php artisan storage:link
    ```

11. Accédez à l'application dans votre navigateur en ouvrant l'URL `http://localhost:8888`.


## Auteur




10. Accédez à l'application dans votre navigateur en ouvrant l'URL `http://localhost:8888`.


## Auteur


- MickaelGP - https://github.com/MickaelGP dans le cadre d'un ECF pour l'école [STUDI](https://www.studi.com/)

## License

Ce projet est sous licence MIT. Pour plus d'informations, consultez le fichier [LICENSE](LICENSE).