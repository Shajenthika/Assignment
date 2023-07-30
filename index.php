<?php
    session_start();
    require 'dbcon.php';
?>

<?php include('header.php') ?>


    <div class="container mt-4">

        <?php include('message.php') ?>

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
                                                    <a href="customer-view.php?id=<?= $customer['id'] ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="customer-edit.php?id=<?= $customer['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_customer" value="<?=$customer['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        
                                                    </form>
                                                    
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

<?php include('footer.php') ?>