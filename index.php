<?php
    session_start();
    require 'dbcon.php';
?>

<?php include('header.php') ?>
<?php include('navbar.php') ?>

    <!-- Customer Details -->
    <a name="customer">
        <div class="container mt-4">

            <?php include('message.php') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Customer Details
                            <div class="d-flex justify-content-end">
                                <form role="search" class="input-group" action="" method="GET">
                                    <input class="form-control rounded-pill" name ="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append ms-2">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </form>
                                <a href="customer-create.php" class="btn btn-primary ms-2">Add</a>
                            </div>
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
                                        if(isset($_GET['search'])){
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM customer WHERE CONCAT(first_name,middle_name,last_name) LIKE '%$filtervalues%'";
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
                                        }
                                        else{
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
                                        }
                                        
                                        
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>


    <!-- Item Details -->
    <a name="item">
        <div class="container mt-4" >

            <?php include('message.php') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Item Details
                            <div class="d-flex justify-content-end">
                                <form role="search" class="input-group">
                                    <input class="form-control rounded-pill" name ="search2"  value="<?php if(isset($_GET['search2'])){echo $_GET['search2']; } ?>" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append ms-2">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </form>
                                <a href="item-add.php" class="btn btn-primary ms-2">Add</a>
                            </div>
                                
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Item Category</th>
                                        <th>Item Sub Category</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['search2'])){
                                            $filtervalues = $_GET['search2'];
                                            $query = "SELECT * FROM item WHERE CONCAT(item_name,item_category,item_subcategory) LIKE '%$filtervalues%'";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $item){
                                                    ?>
                                                    <tr>
                                                        <!-- <td><?= $item['id'] ?></td> -->
                                                        <td><?= $item['item_code'] ?></td>
                                                        <td><?= $item['item_name'] ?></td>
                                                        <td><?= $item['item_category'] ?></td>
                                                        <td><?= $item['item_subcategory'] ?></td>
                                                        <td><?= $item['quantity'] ?></td>
                                                        <td><?= $item['unit_price'] ?></td>
                                                        <td>
                                                            <a href="item-view.php?id=<?= $item['id'] ?>" class="btn btn-info btn-sm">View</a>
                                                            <a href="item-edit.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_item" value="<?=$item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                                
                                                            </form>
                                                            
                                                        </td>
                                                    </tr>

                                                    <?php

                                                }
                                            }
                                            else{
                                                echo "<h5>No Records Found.</h5>";
                                            }
                                        }
                                        else{
                                            $query = "SELECT * FROM item";
                                            $query_run = mysqli_query($con,$query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $item){
                                                    ?>
                                                    <tr>
                                                        <!-- <td><?= $item['id'] ?></td> -->
                                                        <td><?= $item['item_code'] ?></td>
                                                        <td><?= $item['item_name'] ?></td>
                                                        <td><?= $item['item_category'] ?></td>
                                                        <td><?= $item['item_subcategory'] ?></td>
                                                        <td><?= $item['quantity'] ?></td>
                                                        <td><?= $item['unit_price'] ?></td>
                                                        <td>
                                                            <a href="item-view.php?id=<?= $item['id'] ?>" class="btn btn-info btn-sm">View</a>
                                                            <a href="item-edit.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                            <form action="code.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_item" value="<?=$item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                                
                                                            </form>
                                                            
                                                        </td>
                                                    </tr>

                                                    <?php

                                                }
                                            }
                                            else{
                                                echo "<h5>No Records Found.</h5>";
                                            }
                                        
                                        }
                                        
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <!-- Reports -->
    <a name="report">
        <div class="container mt-4 mb-4">

            <?php include('message.php') ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <form method="post" action="invoice_report.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="end_date">End Date:</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <label for="">Report Type:</label>
                                            <select id="" name="report" class="form-control">
                                                <option value="invoice_report">Invoice Report</option>
                                                <option value="invoice_item_report">Invoice Item Report</option>
                                                <option value="item_report">Item Report</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" name="search_report" class="btn btn-outline-success mt-4">Search</button>
                                        </div>
                                    </div>
                                </form>

                                <hr>
                                <a href="item-add.php" class="btn btn-primary btn-sm">Invoice Report</a>
                                <a href="item-add.php" class="btn btn-primary btn-sm">Invoice Item Report</a>
                                <a href="item-add.php" class="btn btn-primary btn-sm">Item Report</a>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php include('footer.php') ?>