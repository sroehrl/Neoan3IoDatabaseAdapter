# Easy database adapter for neoan.io and neoan3-apps/db

This wrapper enables the use of the battle-tested neoan3 
legacy default database handler [neoan3-apps/db](https://packagist.org/packages/neoan3-apps/db) 

## Installation
`composer require neoan.io/legacy-db-adapter`

_**NOTE:** There is no need to install neoan3-apps/db separately; this package already requires it_ 

## Setup in neoan.io
Simply drop a new Instance into the neoan.io database connection after app initialization:

For credential keys, please see [Environment variable](https://github.com/sroehrl/neoan3-db/blob/master/README.md#environment-variables)
```php
...
// environment variables (assumes )
$credentials = [
            'host' => Env::get('DB_HOST', 'localhost'),
            'name' => Env::get('DB_NAME', 'neoan_io'),
            'port' => Env::get('DB_PORT', 3306),
            'user' => Env::get('DB_USER', 'root'),
            'password' => Env::get('DB_PASSWORD', ''),
            'charset' => Env::get('DB_CHARSET', 'utf8mb4'),
            'casing' => Env::get('DB_CASING', 'camel'),
            'assumes_uuid' => Env::get('DB_UUID', false),
];


Neoan\Database\Database::connect(new neoan.io\MarketPlace\DatabaseAdaptor($credentials))
...
```

## Documentation
This adapter hooks into the neoan.io framework and requires no active usage. However, for a better understanding, 
please see [neoan3-apps/db](https://packagist.org/packages/neoan3-apps/db)

## License
This Adapter comes with almost no strings attached: [view](LICENSE)