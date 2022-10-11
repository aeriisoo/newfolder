<?php
    include ("connect.php");
    $pstatus = $_POST['upstatus'];
    $orderid = $_GET['OrderID'];

    $sql = "UPDATE orders SET PaymentStatus ='$pstatus' WHERE OrderID='$orderid'";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE)
    {
        echo '<script>alert("Payment Status updated successfully!")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=orderdetailsowner.php?OrderID=".$orderid."\">";
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