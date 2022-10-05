<?php  

include 'db.php';

if(isset($_POST['add'])){
    $name = htmlspecialchars($_POST['name']);
    $last = htmlspecialchars($_POST['last']);
    $age = $_POST['age'];

    echo $name;
    $sql = "INSERT INTO students (name, last, age) VALUES ('$name', '$last', '$age')";

    if($db->query($sql) === TRUE){
        header('location: index.php');
    }else{
        echo "Error: " . $sql . "<br>" . $db->error;
    }

}

?>