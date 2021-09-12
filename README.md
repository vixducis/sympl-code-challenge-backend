# Sympl code challenge

This code was written as part of a code challenge for a job interview at 'sympl' by Wouter Henderickx. This repository only contains the backend. It uses the laravel framework as the basis for an API application. A fully functioning demo can be found at https://www.wouterh.be/sympl/

Small tip: the users' mail addresses can be found in the frontend by hovering over their image.

## Initialization
```bash
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

### Larastan

This codebase supports static code analysis thanks to larastan. The included configuration uses the highest level of checks, 8. You can run it with the following command

``` bash
./vendor/bin/phpstan
```

