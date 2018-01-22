# Simple Logger

## Usage

```php
<?php

// create a logger
$logger = new SimpleLogger( '/absolute/path/to/your/file.log' );

// add your messages
$logger->add( 'testing...' );

$with_print_r = true;
$logger->add( [1, 2, 3, 4], $with_print_r );

$some_description = 'lorem ipsum';
$logger->add( ['dolor sit amet'], $with_print_r, $some_description );

// some falsy values (empty string, empty array and false) will be printed as "NULL"
$logger->add( false );
$logger->add( [] );
$logger->add( '' );

// but 0 (zero) will be printed
$logger->add( 0 );
$logger->add( '0' );
```

content of `/absolute/path/to/your/file.log`
```
[2017-07-01 @ 01:25:23] testing...
[2017-07-01 @ 01:25:23] Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)

[2017-07-01 @ 01:25:23] lorem ipsum: Array
(
    [0] => dolor sit amet
)

[2017-07-01 @ 01:25:23] NULL
[2017-07-01 @ 01:25:23] NULL
[2017-07-01 @ 01:25:23] NULL
[2017-07-01 @ 01:25:23] 0
[2017-07-01 @ 01:25:23] 0
```

*Note: you can use the `can_write` method to check if the log file is writable.*
```php
$is_writable = $logger->can_write();
```

## LICENSE
MIT License &copy; 2018 Luiz Bills
