<?php
include ('connect.php');
session_start();
$username =$_SESSION['username'];
$password=$_SESSION['password'];

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
$productimage = $_POST['productimage'];

$sql = "INSERT INTO product (SellerID, ProductName, Category, ProductPrice, Quantity, Descriptions, ProductImage)
VALUES ('$SellerID','$productname','$category','$price','$quantity','$desc','$productimage')" or die ("Error inserting data into the table");

if($conn->query($sql)===TRUE) {
    echo '<script>alert("Product uploaded successfully!")</script>';
	echo "<meta http-equiv=\"refresh\" content=\"3;URL=uploadproducts.html\">";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//closes specified connection
$conn->close();
?>