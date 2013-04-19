# laravel-generic-database

A database driver for Laravel 4 that provides support for generic PDO drivers

# install

## composer.json

Add a requirement for the package

```javascript
{
    "require": {
        "lamb/laravel-generic-database": "dev-master"
    }
}
```

## config/app.php

Add it to the list of providers

```php
'providers' => array(
  'Lamb\LaravelGenericDatabase\GenericDatabaseServiceProvider'
)
```

## config/database.php

Add a connection using the generic database driver

```php
  'odbc' => array(
    'driver'   => 'generic',
    'dsn'      => 'odbc:DRIVER={IBM DB2 ODBC DRIVER};HOSTNAME=localhost;PORT=50000;DATABASE=SAMPLE;PROTOCOL=TCPIP;UID=db2inst1;PWD=ibmdb2;'
  ),
```

# license

Released under the [MIT license](http://opensource.org/licenses/MIT)
