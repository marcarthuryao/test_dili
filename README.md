# DEMO DiliTrust

**Réalisé par :**

* YAO Kassy Marc Arthur


## Instructions rapides pour l'exécution de l'application

1. Installer **docker** avant de faire la demo. Vous pouvez suivre les instructions là : https://doc.ubuntu-fr.org/docker. Il suffit de recopier les commandes de la section 2 et 3.

2. Une fois docker installé, pour lancer l'application, exécuter le script **script_docker.sh** en faisant la commande:
    ```sh
    $ ./script_docker.sh
    ```

3. Si vous obtenez à la fin du script, à l'avant dernière ligne de l'installation, une erreur **ERROR 2003 (HY000): Can't connect to MySQL server on '172.17.0.2' (111)**, vous devrez re-executer le script comme à l'étape avant de procéder à la demo.

4. Une fois le script exécuté (sans ERROR 2003), rendez vous sur l'adresse http://172.17.0.3 pour effectuer la demo.

5. Une fois la demo terminée, exécuter le script de fin pour arrêter les containers docker de l'application et supprimer les images que vous avez téléchargé. Faites cette commande:
    ```sh
    $ ./script_docker.sh
    ```

## Instructions détaillées pour l'exécution de l'application

1. Lancer la base de donnée mysql dans un container.
    Exécuter les commandes suivantes:
    ```sh
    $ docker run --name mysql_db -d -e MYSQL_ROOT_PASSWORD=504633 -e MYSQL_DATABASE=test mysql:5.7
    $ mysql -h 172.17.0.2 -u root -p504633 test < test_table.sql
    ```
    Ensuite, la base de données se lance dans le container d'adresse IP *172.17.0.2*. Vous pourrez toujours vérifier l'adresse IP de votre container de base de donnée en faisant la commande:
    ```sh
    $ docker ps
    $ docker inspect ID_DU_CONTAINER | grep IPAddress
    ```

2. Lancer l'application dans un container :
    Exécuter les commandes ci-dessous.
    ```sh
    $ docker build -t test_dili .
    $ docker run -d -p 8080:80 -e HOST_DB=172.17.0.2 --name test test_dili
    ```
    Nous pouvons donc accéder aux services en tapant dans l'adresse du navigateur : http://172.17.0.3
    À la fin du test, il faut arrêter les containers à travers les commandes suivantes :
    ```sh
    $ docker kill attaque
    $ docker rm attaque
    ```
    On peut aussi supprimer les images docker qu'on a installé en faisant :
    ```sh
    $ docker rmi $(docker images -a -q)
    ```

## Fin !

