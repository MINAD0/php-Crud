<?php  

$db = new mysqli;

$db->connect('localhost', 'root', '', 'crud');

if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}else{
    echo "Connected to MySQL";
}

?>