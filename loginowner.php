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
$sql = "SELECT * FROM seller WHERE Username ='".$_SESSION['username']."' AND Password ='".$_SESSION['password']."'";
$result = $conn->query($sql);
$row = $conn->query($sql);

if ($result->num_rows ==0)
{
    echo $_SESSION['username'];
    echo $_SESSION['password'];
    echo "Login fail";
    session_unset();
    echo "<meta http-equiv=\"refresh\" content=\"3;URL=loginowner.html\">";
} 
else
{
    include ("homeowner.php");
}
?>