A. Setup
1. sudo docker exec todo_server composer install
2. sudo docker exec todo_server cp .env.example .env
3. Config env
5. sudo docker exec todo_server chmod -R 777 ../www
7. sudo docker exec todo_server php artisan key:generate
8. sudo docker exec todo_server php artisan migrate --seed
9. sudo docker exec todo_server php artisan config:cache

B. Information
1. Get data over laravel resource
2. Using cookie to manage working project
3. Using Event listener to strack user get token login
4. Using Notification Event to send email, notifications to user
5. Using Laravel Pusher to send notifications in realtime