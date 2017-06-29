# Simple Logger

## Usage

```php
<?php

// create a logger
$logger = new SimpleLogger( '/absolute/path/to/your/file.log' );

// add your messages
$logger->log( 'testing...' );
$logger->log_r( [1, 2, 3, 4], 'some description of this line' );
$logger->log_r( [1, 2, 3, 4], 'description with line break', true );
```

outputs on `/absolute/path/to/your/file.log`
```
[2017-05-31 @ 03:51:24] testing...
[2017-05-31 @ 03:51:24] some description of this line: Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
[2017-05-31 @ 03:51:24] description with line break: 
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
```

## LICENSE
MIT License &copy; 2017 Agência Zoop
