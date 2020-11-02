Laravel 8 with https://github.com/GitLabPHP/Client

```
composer require graham-campbell/gitlab guzzlehttp/guzzle http-interop/http-factory-guzzle
```

## How

Setup the `.env` file with your details, then run
```
php artisan serve
```

## User IDs
- AK 3110488 

## Routes
- `/events` Events for the User ID set in `.env`
- `/events/{user_id}` Show events for a specific user ID
