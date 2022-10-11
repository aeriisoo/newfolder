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

    .registerform{
        margin-top: 50px;
    }

    .registerform label {
    display: inline-block;
    width: 25%;
    text-align: left;
    padding-right: 50px;
    }

    .registerform input {
    padding: 7px 10px;
    width: 45%;
    background-color: rgb(244, 244, 244);
    border: 1px solid black;
    }

    .iconbars a{
      color: #003a87;
      float: right;
      font-size: 25px;
      margin:5px 7px;
    }

    .allproduct *{
    box-sizing: border-box;
    /*border-radius: 100px;*/
    }
  
    .allproduct{
    width: 70%;
    margin: auto;
    }
  
    .product {
    border: 20px solid white;
    background-color: white;
    display: inline-block;
    margin: 10px 15px;
    text-align: left;
    }
  
    .product:hover {
    border: 20.5px solid #ffffff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  
    .product img {
    max-width: 100%;
    max-height: 100%;
    }

    .availableproduct{
    font-size: 20px;
    font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
    color: white;
    background-color: #003a87;
    width: 62%;
    border-radius: 10px;
    padding: 15px 0px;
    margin: 30px auto;
    }

    .productname {
    margin-top: 15px;
    text-align: left;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 14px;
    text-overflow:ellipsis;
    white-space: nowrap;
    overflow: hidden;
    width: 200px;
    }

    .productprice {
    margin-top: 2px;
    text-align: left;
    float: left;
    }

    .productsold{
    float: right;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 12px;
    margin-top: 5px;
    }

    .productprice h3, .productprice h5{
    display: inline;
    color:#003a87;
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
      MY PRODUCT
    </header>

      <div class="allproduct">

      <?php
      $sql = "SELECT * FROM product where SellerID='$sellerid'";
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        while($row=mysqli_fetch_array($result)){
        echo "<div class='product'>
              <a href='updateproducts.php?ProductID=".$row['ProductID']."'><img src='Products/".$row['ProductImage']."' alt='Image' width='200' height='200'></a>
              <div class='productname'>".$row['ProductName']."</div>
              <div class='productprice'><h5>RM</h5><h3>".$row['ProductPrice']."</h3></div>
              <div class='productsold'>".$row['Quantity']." left</div>
            </div>"; 
        }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      ?>

      </div>

    <form>
      
      <button type="submit" value="Back" formaction="/e-Niaga/uploadproducts.html">UPLOAD PRODUCT</button>
    </form>
  </section>

</body>

</html>
