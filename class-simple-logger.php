<?php

/**
 * @version 1.1.0
 */

class SimpleLogger {

	function __construct ( $filepath ) {
		if ( ! file_exists( dirname( $filepath ) ) ) {
			mkdir( dirname( $filepath ), 0777, true );
		}
		$this->filepath = $filepath;
	}

	function log ( $content = '' ) {
		$content .= PHP_EOL;
		return file_put_contents( $this->filepath, $content, FILE_APPEND );
	}
	
}
