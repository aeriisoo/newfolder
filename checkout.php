<?php
include ('connect.php');
session_start();
//get sellerid
$username =$_SESSION['username'];
$password =$_SESSION['password'];
$productid =$_GET['ProductID'];
$amount =$_POST['amount'];

$sql = "SELECT CustomerID FROM Customer where Username='$username' and Password='$password'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
  while($row=mysqli_fetch_array($result)){
    $customerid = $row['CustomerID'];
  }
}
else {
    echo "0 results";
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
    margin: 50px;
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

    .btn{
      text-align: right;
    }

    button[type=submit] {
      background-color: #003a87;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 20%;
      margin: 0px 10px;
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

    .receipt {
      display: none;
    }

    .iconbars a{
      color: #003a87;
      float: right;
      font-size: 25px;
      margin:5px 7px;
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
    <!--<a href="ordershopper.html" title="Order"><i class="fa-solid fa-list-check"></i></a>
    <a href="productshopper.html" title="Product"><i class="fa-solid fa-bag-shopping"></i></a>-->
    </div>
  </nav>

  <section>
    <header class="myorder">
      ORDER CONFIRMATION
    </header>

    <div class="myorderwrap">
      <form class='uploadcontainer'  method='POST' action='checkoutorder.php'>
      <?php
            $sql = "SELECT * FROM product JOIN seller where ProductID=$productid and seller.SellerID = product.SellerID";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
              while($row=mysqli_fetch_array($result)){

              $convert = $amount * $row['ProductPrice'];
              $totalprice = number_format((float)$convert, 2, '.', '');
                
              echo "
                <div class='row'>
                <h2>Order Details</h2>
                <div class='productimage'><img class='img' src='Products/".$row['ProductImage']."'></div>
                    <div class='productlabel'>
                        <h4 style='font-weight: bolder; padding-top: 10px;'>".$row['ProductName']."</h4>
                        <div class='row1'>
                            <div style='float: left; width: 50%;'><h4>RM".$row['ProductPrice']."</h4></div>
                            <div style='float: right; width: 50%; text-align: end;'><h4>x".$amount."</h4></div>
                        </div>
                        <hr>
                        <div class='row1'>
                            <div style='float: left; width: 50%;'><h4>Subtotal</h4></div>
                            <div style='float: right; width: 50%; text-align: end;'><h4>RM".$totalprice."</h4></div>
                        </div>
                    </div>          
                </div>

            <div>
            <br>
            <h2>Delivery Option</h2>
            <fieldset id='dmethod'>
            <input required type='radio' name='dmethod' value='Pickup'> 
            <label for='html'>Self-Pickup</label><br>
            <input type='radio' name='dmethod' value='Deliver'>
            <label for='html'>Room Delivery</label><br>
            </fieldset>
            </div><br>

            <div>
            <h2>Payment Option</h2>
            <fieldset id='pmethod'>
            <input required type='radio' name='pmethod' value='Cash On Delivery' onclick='show1();'> 
            <label for='html'>Cash On Delivery (COD)</label><br>
            <input type='radio' name='pmethod' value='Online Transfer' onclick='show2();'>
            <label for='html'>Online Transfer</label><br>
            </fieldset>
            </div><br>

            <div class='receipt' id='receipt'>
            <h2>Bank Details</h2>
                <div class='float-child1'>
                  <h4 style='font-weight: bolder; padding-top: 10px;' name='bankname'>Bank Name</h4>
                  <h4 style='font-weight: bolder; padding-top: 10px;' name='banknumber'>Bank Account</h4>
                  <h4 style='font-weight: bolder; padding-top: 10px;' name='receipt'>Upload Receipt</h4>

                </div>
                <div class='float-child2'>
                  <h4 style='padding-top: 11px;' name='bankname'>".$row['BankName']."</h4>
                  <h4 style='padding-top: 11px;' name='banknumber'>".$row['BankNumber']."</h4>
                  <input style='width: 100%; padding-top: 12px;' type='file' name='receipt' id='receipt'>
                </div>

            </div>
            <h2 style='background-color: white;'></h2>
            <div class='btn'>
            <button type='submit' formaction='/e-Niaga/homeshopper.php'>Cancel</button>
            <button type='submit' formaction='/e-Niaga/checkoutorder.php?ProductID=".$productid."&Amount=".$amount."&CustomerID=".$customerid."&TotalPrice=".$totalprice."'>Place Order</button>
            </div>
            ";
          }
      }
      else {
          echo "0 results";
      }
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
