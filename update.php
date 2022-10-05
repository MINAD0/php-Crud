<!DOCTYPE html>
<?php  

include'db.php';

$id = (int)$_GET['id'];

$sql = "SELECT * FROM students WHERE id = '$id'";

$results = $db->query($sql);

$result = $results->fetch_assoc();

if(isset($_POST['update'])){
    $name = htmlspecialchars($_POST['name']);
    $last = htmlspecialchars($_POST['last']);
    $age = $_POST['age'];

    $sql = "UPDATE students SET name = '$name', last = '$last', age = '$age' WHERE id = '$id'";

    if($db->query($sql) === TRUE){
        header('location: index.php');
    }else{
        echo "Error: " . $sql . "<br>" . $db->error;
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD UPDATE</title>
</head>
<body>
    <div class="container mt-5">
        <form  method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">FirstName</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $result['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">LastName</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="last" value="<?php echo $result['last']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Age</label>
                        <input type="number" class="form-control" id="exampleFormControlInput3" name="age" value="<?php echo $result['age']; ?>">
                    </div>
                <input  class="btn btn-primary" name="update" type="submit" value="edit student">
                <a href="index.php" class="btn btn-primary">Back</a>
        </form> 
    </div>
</body>
</html>



