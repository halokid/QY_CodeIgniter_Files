<?php
if (! defined ( 'BASEPATH' )) 
    exit ( 'No direct script access allowed' );
    
$config ['memcached'] = array (
'hostname' => '127.0.0.1',
'port' => 12111,//default port is 11211
'weight' => 1 
);
?>

