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
docker-compose build app
docker-compose up -d
docker-compose ps (optional: to check if things are up and running)
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
```
4. You should now be able to access the project at http://localhost:8000