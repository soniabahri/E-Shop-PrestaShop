# Colors
GREEN="\033[0;32m"
RED="\033[0;31m"
RESET="\033[0m"

echo "$GREEN == Starting docker containers == $RESET"
docker compose up -d
echo "$GREEN == Docker containers up == $RESET"

postgresContainerId=$(docker ps -qf "name=ps_metrics_postgres")

if [ -z "$postgresContainerId" ]
then
      echo "$RED Postgres container not found. Exiting script. $RESET"
      exit 1
else

    echo "$GREEN Found postgres container: $postgresContainerId $RESET"
    
    echo "$GREEN Wating a few seconds for postgres to be initialized $RESET"
    sleep 10

    echo "$GREEN == Starting database init == $RESET"

    for FILE in ./sql/*; 
    do 
        docker exec -i $postgresContainerId psql -U analytics -d analytics < $FILE
    done
    echo "$GREEN == Database init done == $RESET"

fi


