<?php

    include ("connect.php");

    $name = $_POST['name'];
    $matricno = $_POST['mnum'];
    $phoneno = $_POST['pnum'];
    $address = $_POST['address'];
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $npassword = $_POST['nword'];
    $cpassword = $_POST['cword'];

    $sql = "UPDATE customer SET Name='$name', MatricNo='$matricno', PhoneNo='$phoneno', Address='$address', Username='$username' WHERE Username='$username'";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE)
    {
        //echo "<p style='text-align:center'>Data $username Had Been Updated!";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=accshopperviews.php\">";
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