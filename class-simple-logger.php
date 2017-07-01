<?php
/**
 * @version 2.0.0
 */
class SimpleLogger {

	protected $date_format = 'Y-m-d @ H:i:s';

	public function __construct ( $filepath ) {
		if ( ! file_exists( $filepath ) ) {
			$dir = dirname( $filepath );
			$chmod_dir = defined( 'FS_CHMOD_DIR' ) ? FS_CHMOD_DIR : ( 0775 & ~umask() );
			$chmod_file = defined( 'FS_CHMOD_FILE' ) ? FS_CHMOD_FILE : ( 0664 & ~umask() );

			if ( ! file_exists( $dir ) ) {
				@mkdir( $dir, $chmod_dir, true );
			}
			@chmod( $filepath, $chmod_file );
		}
		$this->filepath = $filepath;
	}

	public function add ( $data, $readable = false, $description = null ) {
		$message = '[' . date( $this->date_format ) . '] ';

		if ( ! empty( $description ) ) {
			$message .= $description . ': ';
		}

		if ( $this->is_printable( $data ) ) { 
			$message .= $readable ? print_r( $data, true ) : $data;
			if ( is_array( $data ) ) {
				reset( $data );
			}
		} else {
			$message .= 'NULL';
		}

		return $this->write( $message );
	}

	protected function is_printable ( $value ) {
		return ! empty( $value ) || is_numeric( $value );
	}

	protected function write ( $content ) {
		return file_put_contents( $this->filepath, $content . PHP_EOL, FILE_APPEND );
	}
}

/*
// use to log in text or a console
class ConsoleLogger extends SimpleLogger {
    public function __construct () {
        // do nothing
	}
	
	protected function write ( $content ) {
		echo $content . PHP_EOL;
		return true;
	}
}
*/
