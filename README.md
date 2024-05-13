1. sudo docker exec todo_server composer install
2. sudo docker exec todo_server cp .env.example .env
3. Config env
5. sudo docker exec todo_server chmod -R 777 ../www
7. sudo docker exec todo_server php artisan key:generate
8. sudo docker exec todo_server php artisan migrate --seed
9. sudo docker exec todo_server php artisan config:cache