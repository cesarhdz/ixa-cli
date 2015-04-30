<?php

namespace Ixa\Cli;

use Rah\Danpu\Dump;
use Rah\Danpu\Export;

class DbService
{
	/**
	 * Export
	 *
	 * @throws  Exception Any exception Mysql throws
	 * @param  Array $db   
	 * @arg [db_name] 
	 * @arg db_host
	 * @args db_user
	 * @args db_password
	 * @param  [type] $file Destination
	 * @param  String $tmp  Temporary file
	 * @return Export       export result
	 */
	function export($db, $file, $tmp){
	    $dump = new Dump();
	    
	    //@TODO Add timestamp and extension

	    $dump->file($file)
	        ->dsn('mysql:dbname='.$db['db_name'].';host='.$db['db_host'])
	        ->user($db['db_user'])
	        ->pass($db['db_password'])

	        //@TODO Add Prefix support
	        // ->prefix($db[''])
	        ->tmp($tmp);

	    return new Export($dump);
	}
}
