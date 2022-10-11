<?php
    include ("connect.php");
    $ostatus = $_POST['ostatus'];
    $orderid = $_GET['OrderID'];

    $sql = "UPDATE orders SET OrderStatus ='$ostatus' WHERE OrderID='$orderid'";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE)
    {
        echo '<script>alert("Order Status updated successfully!")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=orderdetailsshopper.php?OrderID=".$orderid."\">";
        echo "<p>";
    }
    else 
    {
        echo "<p>";
        echo "<p style='text-align:center'>Error: " . $sql . "<br>" . $conn->error;
        echo "<p>";
    }

    $conn->close();
?>