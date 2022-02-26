# Prerequisite

## Authentication with GCP

You need to be authenticated on gcp to be able to download some images.
If you have the gcloud CLI, you can use the following command:

`gcloud auth login`

Then create a docker config.json by using the following command:

`gcloud auth configure-docker`

More information ca be found on: 

https://cloud.google.com/container-registry/docs/advanced-authentication

## Environment file

In order to use this docker compose, you need to create your own .env file.
You can duplicate and rename the file `.env.dist` to `.env` .

## First Launch

When you run the local environment for the first time you can run the `init.sh` script. Depending on your environment you might need to add execution priveliges on the script

`chmod +x ./init.sh`

Then 
`./init.sh`

⚠️ If you rerun this script, it will reset your local metrics database.


# Using Docker Compose

Starting the docker containers

`docker compose up -d`

Stopping the docker containers

`docker compose stop`

Removing everything for a fresh start

`docker compose down -v`
