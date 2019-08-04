# chatbot

## Startup guides for docker

```
docker-compose -f Dockerfiles/docker-compose.yml up -d
docker-compose -f Dockerfiles/docker-compose.yml run --rm composer update
cp laravel/.env.docker laravel/.env
docker-compose -f Dockerfiles/docker-compose.yml run --rm fpm bash -c "cd /data/laravel/ && php artisan key:generate"
docker-compose -f Dockerfiles/docker-compose.yml run --rm fpm bash -c "cd /data/laravel/ && php artisan migrate:refresh --seed"
```

- to start the app on [http://localhost/](http://localhost)

- stop containers
  ```
  docker-compose -f Dockerfiles/docker-compose.yml down
  ```