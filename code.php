<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer'])){
    $customer_id =  mysqli_real_escape_string($con,$_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id= '$customer_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Customer is Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_customer'])){
    $customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $first_name = mysqli_real_escape_string($con,$_POST['first-name']);
    $middle_name = mysqli_real_escape_string($con,$_POST['middle-name']);
    $last_name = mysqli_real_escape_string($con,$_POST['last-name']);
    $contact_no = mysqli_real_escape_string($con,$_POST['contact-no']);
    $district = mysqli_real_escape_string($con,$_POST['district']);

    $query = "UPDATE customer SET title='$title',first_name='$first_name',middle_name='$middle_name',last_name='$last_name',contact_no='$contact_no',district='$district' 
    WHERE id='$customer_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Customer is Not Updated";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_customer'])){
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $first_name = mysqli_real_escape_string($con,$_POST['first-name']);
    $middle_name = mysqli_real_escape_string($con,$_POST['middle-name']);
    $last_name = mysqli_real_escape_string($con,$_POST['last-name']);
    $contact_no = mysqli_real_escape_string($con,$_POST['contact-no']);
    $district = mysqli_real_escape_string($con,$_POST['district']);
    
    $district_id = 0;
    $district_query = "SELECT id FROM district WHERE district = '$district'";
    $result = mysqli_query($con,$district_query);
    //$result = $con->query($district_query);

    if ($result->num_rows > 0) {
        // If the district exists, get its ID
        //$district_data = mysqli_fetch_assoc($result);
        $district_data = $result->fetch_assoc();
        $district_id = $district_data['id'];
    }else {
        echo "Error: " . $con->error;
        exit;
    }

    $query = "INSERT INTO customer (title,first_name,middle_name,last_name,contact_no,district)
        VALUES('$title','$first_name','$middle_name','$last_name','$contact_no','$district_id')";
    
    $query_run = mysqli_query($con,$query);
    if($query_run){
        echo "Customer Created Successfully";
        // $_SESSION['message'] = "Customer Created Successfully";
        // header("Location: customer-create.php");
        // exit(0);
    }
    else{
        // Handle the error if the customer insertion fails
        echo "Error inserting customer: " . mysqli_error($con);
        exit;
        // $_SESSION['message'] = "Customer Is Not Created";
        // header("Location: customer-create.php");
        // exit(0);
    }
    $conn->close();
}

?>