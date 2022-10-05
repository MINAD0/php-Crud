<!doctype html>
<?php  

include'db.php';
$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ((int)$_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "SELECT * FROM students LIMIT " . $start . ',' . $perPage;
$total = $db->query("SELECT * FROM students")->num_rows;
$pages = ceil($total / $perPage);

$results = $db->query($sql);


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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add</button>
                <button type="button" class="btn btn-warning float-end" onclick="print()">Print</button>
                <hr><br>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Student Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="add.php" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">FirstName</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput2" class="form-label">LastName</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2" name="last">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput3" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput3" name="age">
                                        </div>
                                        <input  class="btn btn-primary" name="add" type="submit" value="Add student">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center d-flex justify-content-start">
                        <p class="h2 me-4">Search</p>
                        <form action="search.php" method="POST" class="form-group">
                            <input type="text" name="search" id="search" class="form-control mt-1" placeholder="Search">
                            
                        </form>
                    </div>
                    
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
                    <center class="d-flex justify-content-center">
                        <ul class="pagination">
                            <?php  for($i=1; $i <= $pages; $i++): ?>
                            <li class="page-item">
                                <a href="?page=<?php echo $i;?>&per-page=<?php echo $perPage ?>" class="page-link"><?php echo $i; ?></a>
                            </li>
                            <?php  endfor; ?>
                        </ul>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>