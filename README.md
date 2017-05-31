# Simple Logger

## Usage

```php
<?php

// create a logger
$logger = new SimpleLogger( '/absolute/path/to/your/file.log' );

// add your messages
$logger->log( 'testing...' );
$logger->log_r( [1, 2, 3, 4], 'logs with print_r:' );
```

outputs on `/absolute/path/to/your/file.log`
```
2017-05-31 @ 03:51:24 - testing...
2017-05-31 @ 03:51:24 - logs with print_r: Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
)
```

## LICENSE
MIT License © 2017 Agência Zoop
