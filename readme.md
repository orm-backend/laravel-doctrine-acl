# ACL interface implementation. Permissions are stored in the database.

## Dependencies

 * [vvk/laravel-doctrine](https://github.com/vvk-kolsky/laravel-doctrine)

## Install

* Add composer repository

```BASH
"repositories": [
	{
       "type": "vcs",
       "url": "git@github.com:vvk-kolsky/laravel-doctrine.git"
    },
    {
       "type": "vcs",
       "url": "git@github.com:vvk-kolsky/laravel-doctrine-acl.git"
    }
]
```

* Install packages

```BASH
composer require vvk/laravel-doctrine-acl
```

## Setting up

* Publising model and creating the DB tables

```BASH
php artisan vendor:publish --provider="VVK\ACL\PackageServiceProvider"
php artisan doctrine:clear:metadata:cache
php artisan doctrine:schema:validate
php artisan doctrine:schema:update
```

## Next

To manage permissions install [vvk/laravel-doctrine-admin](https://github.com/vvk-kolsky/laravel-doctrine-admin) package.
