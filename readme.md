# Lumen Role Based Auth
Starter kit for JWT auth and role based access

## What's Added

- [Lumen 5.4](https://github.com/laravel/lumen/tree/v5.4.0).
- [JWT Auth](https://github.com/tymondesigns/jwt-auth) for Lumen Application. <sup>[1]</sup>
- [Dingo](https://github.com/dingo/api) to easily and quickly build your own API. <sup>[1]</sup>
- [Lumen Generator](https://github.com/flipboxstudio/lumen-generator) to make development even easier and faster.
- [CORS and Preflight Request](https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS) support.
- [Entrust Lumen](https://github.com/proshore/entrust-lumen) for role based authentication.
- [Lumen Vendor Publish](https://github.com/laravelista/lumen-vendor-publish) to be able to use `php artisan vendor:publish`.

> [1] Added via [this package](https://packagist.org/packages/krisanalfa/lumen-dingo-adapter).

## Usage

Clone this repo

Install package: 

```
composer install
```

Generate `JWT_SECRET` that will be added to `config/jwt.php` using below command:

```
php artisan jwt:generate
```

Rename `.env.example` to `.env` and configure for authenticating via database, don't forget to firstly create the database

Set the `API_PREFIX` parameter in `.env` file (usually `api`).

Set `JWT_SECRET` in `.env` to string that generated using `php artisan jwt:generate` previously

Run `php artisan migrate --seed`

Download postman collection [here](https://www.getpostman.com/collections/a0cbef49138b98fecfe1)

## References

- https://github.com/krisanalfa/lumen-jwt