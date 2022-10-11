<?php
include ('connect.php');
session_start();
//get sellerid
$username =$_SESSION['username'];
$password =$_SESSION['password'];

$sql = "SELECT SellerID FROM seller where username='$username' and password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0) {
    //output seller id
    while($row = $result ->fetch_assoc()) {
    	//set seller id
    	$sellerid = $row['SellerID'];
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
  <link rel="shortcut icon" type="image/x-icon" href="/Source/faviconnnn.png" />
  <script src="https://kit.fontawesome.com/b830ea945f.js" crossorigin="anonymous"></script>

  <title>e-Niaga</title>

  <style>
    .myorder{
    font-size: 20px;
    font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
    color: white;
    background-color: #003a87;
    width: 50%; 
    border-radius: 10px;
    padding: 15px 0px;
    margin: 30px auto 0px auto;
    text-align: center;
    }

    .myorderwrap{
    color:#003a87;
    background-color: #ffffff;
    width: 62%;
    min-height: 100px;
    overflow: hidden;
    }

    section{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    line-height: 1.618em;
    text-align: center;
    }

    button[type=submit] {
      background-color: #003a87;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      margin: 20px 20px 40px 20px;
      width: 20%;
      border-radius: 5px ;

    }

    button[type=submit]:hover {
      background-color: #ffffff;
      color: #003a87;
      border: 2px solid #003a87;
    }


    .iconbars a{
      color: #003a87;
      float: right;
      font-size: 25px;
      margin:5px 7px;
    }

    .allorder *{
    box-sizing: border-box;
    /*border-radius: 100px;*/
    }
  
    .allorder{
    width: 50%;
    margin: auto;
    }

    a:link { text-decoration: none; }


    a:visited { text-decoration: none; }


    a:hover { text-decoration: none; }


    a:active { text-decoration: none; }

    .order {
    background-color: white;
    display: inline-block;
    text-align: left;
    min-width: 100%;
    margin-top: 20px;
    }
  
    .order:hover {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    h3 {
    text-align: left;
    color: #003a87;
    line-height: 5px;
    }

    .productimage{
      float: left;
      margin: 20px;
    }

    .orderdetails{
      margin-top: 30px;
    }

    .orderstatus h3{
      font-family: Arial, Helvetica, sans-serif;
      font-style: italic;
      font-size: 14px;
      color:#181818;
    }

    .matricno h3{
      font-family: Arial;
      font-size: 14px;
    }

    .img {
      width: 90px;
      height: 90px;
    }


  </style>

</head>

<body class="homeshopper">
  <nav>
    <a class="logo" href="homeowner.php" title="e-NIAGA"><img src="Source/1(1).svg"></a>
    <div class="iconbars">
      
    <a href="logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
    <a href="accownerviews.php" title="Account"><i class="fa-solid fa-user"></i></a>
    <a href="orderowner.php" title="Order"><i class="fa-solid fa-list-check"></i></a>
    <a href="productowner.php" title="Product"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
  </nav>

  <section>
    <header class="myorder">
      ORDER RECEIVED
    </header>

      <div class="allorder" style="margin-bottom: 40px;">
      <?php
      $sql = "select * from orders JOIN customer ON customer.CustomerID = orders.CustomerID JOIN product ON product.ProductID = orders.ProductID where product.ProductID IN (SELECT ProductID FROM product WHERE product.SellerID =$sellerid)";
      //select * from orders JOIN customer ON customer.CustomerID = orders.CustomerID JOIN product ON product.ProductID = orders.ProductID where product.ProductID IN (SELECT ProductID FROM product WHERE product.SellerID = 2);
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        while($row=mysqli_fetch_array($result)){
        echo "
        <div class='order'>
          <a href='orderdetailsowner.php?OrderID=".$row['OrderID']."'>
          <div class='productimage'>
            <img class='img' src='Products/".$row['ProductImage']."'>
          </div>
          <div class='orderdetails'>
            <div class='productname'><h3>".$row['ProductName']."</h3></div>
            <div class='matricno'><h3>".$row['MatricNo']."</h3></div>
            <div class='orderstatus'><h3>Order Status: ".$row['OrderStatus']."</h3></div>
            <div class='orderstatus'><h3>Payment Status: ".$row['PaymentStatus']."</h3></div>
          </div>
          </a>
        </div>";
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    ?>
      </div>
  </section>

</body>

</html>
