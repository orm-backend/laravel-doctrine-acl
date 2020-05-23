# ACL interface implementation. Permissions are stored in the database.

## Requirements

"it-aces/laravel-doctrine"

## Installation

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

To manage permissions, install the **it-aces/laravel-doctrine-admin** package.
