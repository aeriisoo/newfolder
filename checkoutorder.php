<?php

    include ("connect.php");

    $productid = $_GET['ProductID'];
    $amount = $_GET['Amount'];
    $customerid = $_GET['CustomerID'];
    $totalprice = $_GET['TotalPrice'];
    $deliverymethod = $_POST['dmethod'];
    $paymentmethod = $_POST['pmethod'];
    //$paymentreceipt = $_POST['preceipt'];
    $receipt = $_POST['receipt'];

    $sql = "INSERT INTO orders (ProductID, CustomerID, Amount, TotalPrice, DeliveryMethod, PaymentMethod, PaymentReceipt)
    VALUES ('$productid','$customerid','$amount', '$totalprice', '$deliverymethod', '$paymentmethod', '$paymentreceipt')" or die ("Error inserting data into the table");
    
    if($conn->query($sql)===TRUE) {
        //echo "New record created successfully";
        echo '<script>alert("Order submitted successfully!")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=homeshopper.php\">";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //closes specified connection
    $conn->close();
?>
