# ACL interface implementation. Permissions are stored in the database.

## Dependencies

 * [it-aces/laravel-doctrine](https://bitbucket.org/vitaliy_kovalenko/laravel-doctrine/src/master/)

## Install

* Add composer repository

```BASH
"repositories": [
	{
       "type": "vcs",
       "url": "git@bitbucket.org:vitaliy_kovalenko/laravel-doctrine.git"
    },
    {
       "type": "vcs",
       "url": "git@bitbucket.org:vitaliy_kovalenko/laravel-doctrine-acl.git"
    }
]
```

* Install packages

```BASH
composer require it-aces/laravel-doctrine-acl
```

## Setting up

* Publising model and creating the DB tables

```BASH
php artisan vendor:publish --provider="ItAces\ACL\PackageServiceProvider"
php artisan doctrine:clear:metadata:cache
php artisan doctrine:schema:validate
php artisan doctrine:schema:update
```

## Next

To manage permissions, install [it-aces/laravel-doctrine-admin](https://bitbucket.org/vitaliy_kovalenko/laravel-doctrine-admin/src/master/) package.
