#!/bin/bash
docker run --name mysql_db -d -e MYSQL_ROOT_PASSWORD=504633 -e MYSQL_DATABASE=test mysql:5.7
docker build -t test_dili .
docker run -d -p 8080:80 -e HOST_DB=172.17.0.2 --name test test_dili
docker ps
mysql -h 172.17.0.2 -u root -p504633 test < test_table.sql
echo "##### Application started in docker containers. Connect on http://172.0.0.3/ ######"
