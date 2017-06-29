<?php
/**
 * @version 1.3.0
 */
class SimpleLogger {

	protected $date_format = 'Y-m-d @ H:i:s';

	public function __construct ( $filepath ) {
		if ( ! file_exists( $filepath ) ) {
			$dir = dirname( $filepath );
			$chmod_dir = defined( 'FS_CHMOD_DIR' ) ? FS_CHMOD_DIR : ( 0775 & ~umask() );
			$chmod_file = defined( 'FS_CHMOD_FILE' ) ? FS_CHMOD_FILE : ( 0664 & ~umask() );
			if ( ! file_exists( $dir ) ) @mkdir( $dir, $chmod_dir, true );
			@chmod( $filepath, $chmod_file );
		}
		$this->filepath = $filepath;
	}

	public function log ( $message ) {
		if ( ! $this->is_printable( $message ) ) {
			$message = 'NULL';
		} elseif ( is_array( $message ) ) {
			$message = implode( ' ', $message );
		}
		return $this->write( '[' . date( $this->date_format ) . '] ' . $message );
	}

	public function log_r ( $value = '', $description = '', $break = false ) {
		$message = '';
		if ( ! empty( $description ) ) {
			$message .= $description . ': ';
			if ( $break === true ) {
				$message .= PHP_EOL;
			}
		}
		$message .= $this->is_printable( $value ) ? print_r( $value, true ) : 'NULL';
		if ( is_array( $value ) ) {
			reset( $value );
		}
		return $this->log( $message );
	}
	
	protected function is_printable ( $value ) {
		return ! ( empty( $value ) && ! is_numeric( $value ) );
	}
	
	protected function write ( $content ) {
		return file_put_contents( $this->filepath, $content . PHP_EOL, FILE_APPEND );
	}
}
