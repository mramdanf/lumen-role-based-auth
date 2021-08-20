# Lumen Role Based Auth
Starter kit for JWT auth and role based access

## What's Added

- [Lumen 5.4](https://github.com/laravel/lumen/tree/v5.4.0).
- [JWT Auth](https://github.com/tymondesigns/jwt-auth) for Lumen Application. <sup>[1]</sup>
- [Dingo](https://github.com/dingo/api) to easily and quickly build your own API. <sup>[1]</sup>
- [Lumen Generator](https://github.com/flipboxstudio/lumen-generator) to make development even easier and faster.
- [CORS and Preflight Request](https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS) support.
- [Entrust Lumen](https://github.com/proshore/entrust-lumen) for role based authentication
- [Lumen Vendor Publish](https://github.com/laravelista/lumen-vendor-publish) to be able to use `php artisan vendor:publish`

> [1] Added via [this package](https://packagist.org/packages/krisanalfa/lumen-dingo-adapter).

## Usage

- Run `composer install`
- Run `php artisan jwt:generate`
- Configure your `.env` file for authenticating via database
- Set the `API_PREFIX` parameter in your .env file (usually `api`).
- Run `php artisan migrate --seed`