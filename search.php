<!doctype html>
<?php  
include 'db.php';


if(isset($_POST['search'])){
    $name = $_POST['search'];
    $sql = "SELECT * FROM students WHERE name like '%$name%'";
    $results = $db->query($sql);
}

?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Crud php</title>
    </head>
    <body>  

    <div class="container mt-5">
        <center><h1>Students List</h1></center>

        <div class="row">           
            <div class="col-md-10 col-md-offset-1">
                <button type="button" class="btn btn-warning float-end" onclick="print()">Print</button>
                <hr><br>
                    <div class="col-md-12 text-center d-flex justify-content-start">
                        <p class="h2 me-4">Search</p>
                        <form action="search.php" method="POST" class="form-group">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                        </form>
                        <a href="index.php" class="btn btn-primary ms-2 col-2">back</a>
                    </div>
                    <?php if($results->num_rows < 1): ?>
                        <h2 class="text-danger text-center">Nothing Found</h2>
                    <?php else: ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while($result = $results->fetch_assoc()): ?>
                            <tr>
                                    <th scope="row"><?php echo $result['id']; ?></th>
                                    <td class="col-md-4"><?php echo $result['name']; ?></td>
                                    <td class="col-md-4"><?php echo $result['last']; ?></td>
                                    <td class="col-md-4"><?php echo $result['age']; ?></td>
                                    <td><a href="update.php?id=<?php echo $result['id']?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delete.php?id=<?php echo $result['id']?>" class="btn btn-danger">Delete</a></td>
                            <?php  endwhile; ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>