#!/bin/bash

docker kill test mysql_db
docker rm test mysql_db
docker rmi $(docker images -a -q)
echo "#####  Docker stopped successfully !!  #####"
