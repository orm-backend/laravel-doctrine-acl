# ACL interface implementation. Permissions are stored in the database.

* Add composer repository

```BASH
"repositories": [
    {
       "type": "vcs",
       "url": "git@bitbucket.org:vitaliy_kovalenko/laravel-doctrine-acl.git"
    }
]
```

* Install packages

```BASH
composer require it-aces/laravel-doctrine-acl
composer update
```

To manage permissions, install the **it-aces/laravel-doctrine-admin** package.
