<?php  

include 'db.php';

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM students WHERE id =  '$id'";

    if($db->query($sql) === TRUE){
        header('location: index.php');
    }else{
        echo "Error: " . $sql . "<br>" . $db->error;
    }


?>