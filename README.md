# Simple Logger

## Usage

```php
<?php

// create a logger
$logger = new SimpleLogger( 'path/to/your/file.log' );

// add your messages
$logger->log( 'a log message' );
$logger->log( 'another log message' );
```

outputs on `path/to/your/file.log`
```
a log message
another log message
```

## LICENSE
MIT License © 2017 Agência Zoop
