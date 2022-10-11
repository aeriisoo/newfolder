<?php

$login = FALSE;

//initialize the session
session_start();
if (!isset($_SESSION['username']))
{
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
}

include ('connect.php');

$sql = "SELECT * FROM customer WHERE Username ='".$_SESSION['username']."' AND Password ='".$_SESSION['password']."'";
$result = $conn->query($sql);
$row = $conn->query($sql);

if ($result->num_rows ==0)
{
    echo "Login fail";
    session_unset();
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=loginshopper.html\">";
} 
else
{
    include ("homeshopper.php");
}

?>