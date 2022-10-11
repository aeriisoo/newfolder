<?php
include ('connect.php');
$productid = $_GET['ProductID'];

// sql to delete a record
$sql = "DELETE FROM product WHERE ProductID='$productid'";

if ($conn->query($sql) === TRUE) {
  echo '<script>alert("Successfully deleted the product.")</script>';
  echo "<meta http-equiv=\"refresh\" content=\"3;URL=productowner.php\">";
} else {
  echo "Error deleting record: " . $conn->error;
  echo "Error : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>