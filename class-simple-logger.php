<?php

/**
 * @version 1.2.0
 */

class SimpleLogger {

	protected $date_format = 'Y-m-d @ H:i:s';

	function __construct ( $filepath ) {
		$dir = dirname( $filepath );

		if ( ! file_exists( $dir ) ) {
			$chmod_dir = defined( 'FS_CHMOD_DIR' ) ? FS_CHMOD_DIR : ( 0755 & ~ umask() );
			$chmod_file = defined( 'FS_CHMOD_FILE' ) ? FS_CHMOD_FILE : ( 0644 & ~ umask() );

			@mkdir( $dir, $chmod_dir, true );
			@chmod( $filepath, $chmod_file );
		}

		$this->filepath = $filepath;
	}

	function log ( $message = '' ) {
		$content = date( $this->date_format ) . ' - ' . $message . PHP_EOL;
		return file_put_contents( $this->filepath, $content, FILE_APPEND );
	}

	function log_r ( $value = '', $message = '' ) {
		$message = ! empty( $message ) ? $message . ' ' : '';
		$result = $this->log( $message . print_r( $value, true ) );
		if ( is_array( $value ) ) reset( $value );
		return $result;
	}
}
