<?php
include_once 'dbconn.php';
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'customers'
);
$conn = new mysqli($host,$user,$pass,$db);
// mysql db table to use 
$table = 'customerdetails'; 
// Table's primary key 
$primaryKey = 'id'; 

$columns = array( 
array( 'db' => 'name', 'dt' => 0 ), 
array( 'db' => 'email',  'dt' => 1 ),
array( 'db' => 'user_photo_file',  'dt' => 2 ),
array( 'db' => 'phone',  'dt' => 3 ), 
array( 'db' => 'address',  'dt' => 4),
array( 'db' => 'city',  'dt' => 5 ),
array( 'db' => 'state',  'dt' => 6 ),
array( 'db' => 'country',  'dt' => 7 ),
array( 'db' => 'zip',  'dt' => 8 ), 
array( 'db' => 'qualification',  'dt' => 9 ),       
array( 
'db'        => 'tampstamp', 
'dt'        => 10, 
'formatter' => function( $d, $row ) { 
return date( 'jS M Y', strtotime($row['tampstamp'])); 
} 
), 
array( 
'db'        => 'id',
'dt'        => 11, 
'formatter' => function( $d, $row ) { 
return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Edit </a> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Delete </a>'; 
} 
) 
); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode(
SSP::simple( $_REQUEST, $dbDetails, $table, $primaryKey, $columns ));
?>