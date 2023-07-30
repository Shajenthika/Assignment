<?php
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details
                            <a href="customer-create.php" class="btn btn-primary float-end">Add</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Title</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>District</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM customer";
                                    $query_run = mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $customer){
                                            ?>
                                            <tr>
                                                <!-- <td><?= $customer['id'] ?></td> -->
                                                <td><?= $customer['title'] ?></td>
                                                <td><?= $customer['first_name'] ?></td>
                                                <td><?= $customer['last_name'] ?></td>
                                                <td><?= $customer['contact_no'] ?></td>
                                                <td><?= $customer['district'] ?></td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm">View</a>
                                                    <a href="customer-edit.php?id=<?= $customer['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>

                                            <?php

                                        }
                                    }
                                    else{
                                        echo "<h5>No Records Found.</h5>";
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>