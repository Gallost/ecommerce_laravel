# Running the app
1. cd into the project dir
2. Ensure you have the .env file and if there isn't, copy and paste `.env.example` into `.env`
```
Remember to set the following
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
APP_URL=http://localhost:8000
```
3. Run the following commands
```
# This is required if there's been a change in the Dockerfile
docker-compose build app

# Spins up the containers in background
docker-compose up -d

# Optional: to check if things are up and running
docker-compose ps

# Installs composer dependencies (composer.json)
docker-compose exec app composer install

# Only need to run this once to generate a unique key
docker-compose exec app php artisan key:generate

# This seems to be required for SASS stylesheet compilation
docker-compose exec app npm install

# Required to use some of the login/register scaffolding
docker-compose exec app npm run dev
```
4. You should now be able to access the project at http://localhost:8000