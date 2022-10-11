<?php
include ('connect.php');
session_start();
//get sellerid
$username =$_SESSION['username'];
$password =$_SESSION['password'];
$orderid =$_GET['OrderID'];

$sql = "SELECT CustomerID FROM customer where username='$username' and password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0) {
    //output seller id
    while($row = $result ->fetch_assoc()) {
    	//set seller id
    	$customerid = $row['CustomerID'];
    }
}
else{
    echo "No data!";
}
?>
<html>

    <head>
      <link rel="stylesheet" href="external.css">
      <script src="external.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <script src="https://kit.fontawesome.com/b830ea945f.js" crossorigin="anonymous"></script>
      <title>e-Niaga</title>
    
      <style>
        .myorder{
        font-size: 20px;
        font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
        color: white;
        background-color: #003a87;
        width: 62%;
        border-radius: 10px;
        padding: 15px 0px;
        margin: 30px auto;
        text-align: center;
        }
    
        .myorderwrap{
        color:#003a87;
        background-color: #ffffff;
        width: 62%;
        min-height: 100px;
        overflow: hidden;
        margin: 0px auto 30px auto;
        }
    
        section{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        line-height: 1.618em;
        }
    
        .uploadcontainer{
        text-align: left;
        margin: 50px 50px 10px 50px;
        }
    
        .uploadcontainer h2 {
        display: inline-block;
        width: 100%;
        text-align: left;
        font-size: 20px;
        margin:0 0 1% 0;
        padding: 10px 20px;
        color: #ffffff;
        background-color: #003a87;
        
        }
    
        button[type=submit] {
        background-color: #003a87;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 20px 20px 0px 0px;
        width: 20%;
        }

        button[type=submit]:hover {
        background-color: #ffffff;
        color: #003a87;
        border: 2px solid #003a87;
        }
    
        h4{
          margin-top: 1%;
          margin-bottom: 0%;
          font-weight: lighter;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          font-weight: lighter;
          color: rgb(52, 52, 52);
        }
    
        label{
          font-weight: lighter;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
          color: rgb(52, 52, 52);
        }
    
        .img {
          width: 100px;
          height: 100px;
          
        }
    
        .row{
          display: inline-block;
          width: 100%;
          
        }
    
        .productimage{
          float: left;
          margin: 20px 20px 0 0;
        }
    
        .productlabel{
          max-width: 100%;
        }
    
        hr{
          border-top: 1px solid rgb(0, 0, 0);
        }
    
        fieldset{
          border: none;
        }
    
        .row1{
          display: inline-block;
          width: 80%;
        }

        .row2{
        display: inline-block;
        width: 100%; 
        }
    
        .receipt {
          display: none;
        }
    
        .iconbars a{
          color: #003a87;
          float: right;
          font-size: 25px;
          margin:5px 7px;
        }
    
        .btncenter{
            margin-top: 30px;
            text-align: center;
        }

        .float-container{
            margin: 10px 0;
        }

        .float-child1 {
            width: 35%;
            float: left;
            padding: 0 0 20px 20px;
        }  

        .float-child2 {
            float: left;
            padding: 0 0 20px 20px;
        }  
      </style>
    
    </head>
    
    <body class="homeshopper">
      <nav>
        <a class="logo" href="homeshopper.php" title="e-NIAGA"><img src="Source/1(1).svg"></a>
        <div class="iconbars">
          
        <a href="logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        <a href="accshopperviews.php" title="Account"><i class="fa-solid fa-user"></i></a>
        <a href="ordershopper.php" title="Order"><i class="fa-solid fa-bag-shopping"></i></a>
        </div>
      </nav>
    
      <section>
        <header class="myorder">
          ORDER INFORMATION
        </header>
    
        <div class="myorderwrap">
          <form class='uploadcontainer'  method='POST' action='statusorder.php'>
          <?php
          $sql = "select * from orders JOIN product ON product.ProductID = orders.ProductID JOIN seller ON product.SellerID = seller.SellerID where orders.CustomerID =$customerid AND orders.OrderID =$orderid";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row=mysqli_fetch_array($result)){
            echo "
            <div class='float-container'>
                <h2>Seller Details</h2>
                <div class='float-child1'>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='name'>Name</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='matricno'>Matric No</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='phoneno'>Phone No</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='roomaddress'>Room Addres</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='bankname'>Bank Name</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='banknumber'>Bank Number</h4>
                </div>
                <div class='float-child2'>
                    <h4 style='padding-top: 11px;' name='name'>".$row['Name']."</h4>
                    <h4 style='padding-top: 11px;' name='matricno'>".$row['MatricNo']."</h4>
                    <h4 style='padding-top: 12px;' name='phoneno'>".$row['PhoneNo']."</h4>
                    <h4 style='padding-top: 12px;' name='roomaddress'>".$row['Address']."</h4>
                    <h4 style='padding-top: 12px;' name='bankname'>".$row['BankName']."</h4>
                    <h4 style='padding-top: 12px;' name='banknumber'>".$row['BankNumber']."</h4>
                </div>
            </div><br>

            <div class='float-container'>
                <h2>Order Details</h2>
                <div class='float-child1'>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='date'>Date Ordered</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='pmethod'>Delivery Method</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='pmethod'>Payment Method</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='preceipt'>Payment Receipt</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='pstatus'>Payment Status</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='ostatus'>Order Status</h4>
                    <h4 style='font-weight: bolder; padding-top: 10px;' name='ostatus'>Received Order ?</h4>
                    
                </div>
                <div class='float-child2'>
                    <h4 style='padding-top: 11px;' name='date'>".$row['OrderDate']."</h4>
                    <h4 style='padding-top: 12px;' name='dmethod'>".$row['DeliveryMethod']."</h4>
                    <h4 style='padding-top: 12px;' name='pmethod'>".$row['PaymentMethod']."</h4>
                    <h4 style='padding-top: 10px;' name='preceipt'><a target='_blank' style='color: rgb(52, 52, 52);' href='/e-Niaga/Receipt/".$row['Receipt']."'>View Receipt</a></h4>
                    <h4 style='padding-top: 10px;' name='pstatus'>".$row['PaymentStatus']."</h4>
                    <h4 style='padding-top: 10px;' name='ostatus'>".$row['OrderStatus']."</h4>
                    <select name='ostatus' id='pstatus' style='margin-top: 15px; font-size: 16px;'>
                        <option name='ostatus' value='Pending'>No</option>
                        <option name='ostatus' value='Completed'>Yes</option>
                    </select>
                </div>
            </div><br>

            <div class='row'>
                <h2>Order Subtotal</h2>
                <div class='productimage'><img class='img' src='Products/".$row['ProductImage']."'></div>
                <div class='productlabel'>
                  <h4 style='font-weight: bolder; padding-top: 10px;'>".$row['ProductName']."</h4>
                    <div class='row1'>
                      <div style='float: left; width: 50%;'><h4>RM ".$row['ProductPrice']."</h4></div>
                      <div style='float: right; width: 50%; text-align: end;'><h4>x".$row['Amount']."</h4></div>
                    </div>
                  <hr>
                    <div class='row1'>
                      <div style='float: left; width: 50%;'><h4>Subtotal</h4></div>
                      <div style='float: right; width: 50%; text-align: end;'><h4>RM ".$row['TotalPrice']."</h4></div>
                    </div>
                </div>          
            </div>

            <div class='btncenter'>
                <button type='submit' formaction='ordershopper.php'>BACK</button>
                <button type='submit' formaction='statusorder.php?OrderID=".$orderid."'>UPDATE</button>
            </div><br>";
          }
        }
        else {
            echo "0 results";
        }
        $conn->close();
        ?>
            
          </form>
        </div>
    
      </section>
    
      <script>
        function show1(){
      document.getElementById('receipt').style.display ='none';
      }
      function show2(){
        document.getElementById('receipt').style.display = 'block';
      }
      </script>
    
    </body>
    
    </html>
    