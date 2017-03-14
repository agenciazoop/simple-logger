<?php

/**
 * @version 1.0.0
 */

class SimpleLogger {

	function __construct ( $filepath ) {
		$this->filepath = $filepath;
	}

	function log ( $content = '' ) {
		$content .= PHP_EOL;
		return file_put_contents( $this->filepath, $content, FILE_APPEND );
	}
	
}