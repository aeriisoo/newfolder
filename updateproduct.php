<?php
include ('connect.php');
session_start();
$username =$_SESSION['username'];
$password=$_SESSION['password'];
$productid = $_GET['ProductID'];

$sql = "SELECT SellerID FROM seller where Username='$username' and Password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result ->fetch_assoc()) {
    	$SellerID = $row['SellerID'];
    }
}
else{
    echo "No data!";
}

//insert into product table
$productname = $_POST['pname'];
$category = $_POST['category'];
$price = $_POST['pprice'];
$quantity = $_POST['pquantity'];
$desc = $_POST['pdesc'];

$sql = "UPDATE product SET ProductName='$productname', Category='$category', ProductPrice='$price', Quantity='$quantity', Descriptions='$desc' WHERE ProductID=$productid";

if($conn->query($sql)===TRUE) {
    echo '<script>alert("Product updated successfully!")</script>';
	echo "<meta http-equiv=\"refresh\" content=\"3;URL=updateproducts.php?ProductID=".$productid."\">";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//closes specified connection
$conn->close();
?>