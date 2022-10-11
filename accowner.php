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
    $bankname = $_POST['bankname'];
    $banknumber = $_POST['banknumber'];

    $sql = "UPDATE seller SET Name='$name', MatricNo='$matricno', PhoneNo='$phoneno', Address='$address', BankName='$bankname', BankNumber='$banknumber' WHERE Username='$username'";

    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE)
    {
        echo '<script>alert("Account updated successfully!")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=accownerviews.php\">";
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