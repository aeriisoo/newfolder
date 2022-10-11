<?php
include ('connect.php');

$nm = $_POST['matricno'];
$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "INSERT INTO seller (matricno, username, password)
VALUES ('$nm','$username', '$pass')" or die ("Error inserting data into the table");

if($conn->query($sql)===TRUE) {
    echo '<script>alert("Your account created successfully!")</script>';
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=loginowner.html\">";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//closes specified connection
$conn->close();
?>