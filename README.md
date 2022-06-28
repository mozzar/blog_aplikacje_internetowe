# blog_aplikacje_internetowe
## require
- PHP ^8.0 with extensions for codeigniter 4.2.0
- composer

# docker
- `docker-compose build`
- `docker-compose up`
- `docker exec -it blog-app php spark migrate:refresh`


## commands installing & migration
- `composer install`, `composer update`
- fill .env database
- `php spark migrate:refresh`
- `php spark serve` - to run webserver on default localhost:8080


