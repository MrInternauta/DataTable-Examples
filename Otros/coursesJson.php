<?php

$table = 'courses';

$primaryKey = 'id';

$columns = array(
	array( 'db' => 'id', 'dt' => 'id' ),
	array( 'db' => 'name', 'dt' => 'name' ),
	array( 'db' => 'description',   'dt' => 'description' ),
	array( 'db' => 'id',     'dt' => 'actions' ),
);

$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'elearning',
	'host' => '127.0.0.1'
);

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);