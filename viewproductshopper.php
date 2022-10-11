<?php
include ('connect.php');
session_start();
//get sellerid
$username =$_SESSION['username'];
$password =$_SESSION['password'];
$productid =$_GET['ProductID'];
?>

<html>

<head>
  <link rel="stylesheet" href="external.css">
  <script src="external.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script src="https://kit.fontawesome.com/b830ea945f.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" type="image/x-icon" href="/Source/faviconnnn.png" />
  <script src="https://kit.fontawesome.com/b830ea945f.js" crossorigin="anonymous"></script>

  <title>e-Niaga</title>

  <style>
    body{
      font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
      color: black;
    }
     
    h3{
      font-weight: 100;
    }
    

    .productwrap{
    color:#003a87;
    background-color: #ffffff;
    width: 78%;
    height: 500px;
    margin: 0px auto 30px;
    }

    .productdescription{
    float: right;
    width: 47%;
    height: 500px;
    }

    .productdetail{
    font-size: 20px;
    font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
    color: white;
    background-color: #003a87;
    width: 80%;
    border-radius: 10px;
    padding: 15px 0px;
    margin: 30px auto;
    text-align: center;
    }

    /* Slideshow container */
    .productmedia {
    max-width: 500px;
    position: relative;
    margin: auto;
    float: left;
    }

    /* Next & previous buttons */
    .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
    right: 0;
    border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
    .prev, .next,.text {font-size: 11px}
    }

    /*simple form*/
    * {
      box-sizing: border-box;
    }

    h1{
        text-align: left;
    }

    input[type=text] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type=number] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    textarea{
      padding: 10px;
      font-family: Arial;
      border-color: lightgray;
      border-radius: 5px;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    .rowbutton{
      text-align: center;
    }

    button[type=submit] {
      background-color: #003a87;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100px;
      margin: 20px 10px;
    }

    button[type=submit]:hover {
      background-color: #ffffff;
      color: #003a87;
      border: 2px solid #003a87;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 70%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    } 

    .v-counter {
        border-radius: 5px;
        overflow: auto;
        padding: 2px 2px;
        border: 1px solid #b6b6b6;
    }

    .v-counter input[type=button]:hover {
        color: black;
        font-weight: bold;
        background-color: transparent;
    }
    .v-counter input[type=button], .v-counter input[type=text] {
        display: inline-block;
        width: 32%;
        background-color: transparent;
        outline: none;
        border: none;
        text-align: center;
        cursor: pointer;
        padding: 0px;
        color: black;
        height: 33px;
        font-family: 'Open Sans';
    }

    .iconbars a{
      color: #003a87;
      float: right;
      font-size: 25px;
      margin:5px 7px;
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
    <!--<a href="viewproductshopper.php" title="Product"><i class="fa-solid fa-bag-shopping"></i></a>-->
    </div>
  </nav>

  <section>
    <header class="productdetail">PRODUCT DESCRIPTION</header>
    <div class="productwrap">
        <div class="productmedia">

        <?php
            $sql = "SELECT * FROM product where ProductID='$productid'";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
              while($row=mysqli_fetch_array($result)){
              echo "
              <div class='mySlides fade'>
                <img src='Products/".$row['ProductImage']."' style='width:100%'>
              </div>";
              }
            }
            else {
                echo "0 results";
            }
        ?>
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-angle-left"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-angle-right"></i></a>
        </div>

        <div class="productdescription">
          <form method='POST' action='checkout.php'>
          <?php
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
              while($row=mysqli_fetch_array($result)){
              echo "

              <h1>".$row['ProductName']."</h1>

              <div class='row'>
                <div class='col-25'>
                  <label for='price'>PRICE</label>
                </div>
                <div class='col-75'>
                  <input type='text' id='price' name='price' value='RM ".$row['ProductPrice']."' readonly>
                </div>
              </div>

              <div class='row'>
                <div class='col-25'>
                  <label for='stock'>STOCK</label>
                </div>
                <div class='col-75'>
                  <input type='text' id='stock' name='stock' value='".$row['Quantity']."' readonly>
                </div>
              </div>

              <div class='row'>
                <div class='col-25'>
                  <label for='quantity'>QUANTITY</label>
                </div>
                <div class='col-75'>
                    <input type='number' name='amount'  size='25' value='1' class='count' min='1' max='".$row['Quantity']."' />
                </div>
              </div>
          
              <div class='row'>
                  <div class='col-25'>
                    <label for='category'>CATEGORY</label>
                  </div>
                  <div class='col-75'>
                    <input type='text' id='category' name='category' value='".$row['Category']."' readonly>
                  </div>
                </div>
              
              <div class='row' style='height: 150px;'>
                <div class='col-25'>
                    <label for='desc'>DESCRIPTION</label>
                </div>
                <div class='col-75'>
                    <textarea style='height: 150px; width: 330px; resize:none;' type='text' id='desc' name='desc' readonly >".$row['Descriptions']."</textarea>
                </div>
              </div>
          
              <div class='row rowbutton'>
                <button type='submit' value='Back' formaction='/e-Niaga/homeshopper.php'>Back</button>
                <button type='submit' value='Buy' formaction='/e-Niaga/checkout.php?ProductID=".$productid."'>Buy Now</button>
              </div>";
            }
          }
          else {
              echo "0 results";
          }
          $conn->close();
          ?>
          </form>
        </div>
    </div>
  </section>

  <script>
     // Store references that all functions can use.
     var resultEl = document.querySelector(".resultSet"),
      plusMinusWidgets = document.querySelectorAll(".v-counter");

      // Attach the handlers to each plus-minus thing
      for (var i = 0; i < plusMinusWidgets.length; i++) {
      plusMinusWidgets[i].querySelector(".minusBtn").addEventListener("click", clickHandler);
      plusMinusWidgets[i].querySelector(".plusBtn").addEventListener("click", clickHandler);
      plusMinusWidgets[i].querySelector(".count").addEventListener("change", changeHandler);
      }

      function clickHandler(event) {
      var countEl = event.target.parentNode.querySelector(".count");
      if (event.target.className.match(/\bminusBtn\b/)) {
          countEl.value = Number(countEl.value) - 1;
      } else if (event.target.className.match(/\bplusBtn\b/)) {
          countEl.value = Number(countEl.value) + 1;
          
      }
      triggerEvent(countEl, "change");
      };

      function changeHandler(event) {
      resultEl.value = 0;
      for (var i = 0; i < plusMinusWidgets.length; i++) {
          resultEl.value = Number(resultEl.value) + Number(plusMinusWidgets[i].querySelector('.count').value);

      }

      };

      function triggerEvent(el, type){
      if ('createEvent' in document) {
              var e = document.createEvent('HTMLEvents');
              e.initEvent(type, false, true);
              el.dispatchEvent(e);
          } else {
              var e = document.createEventObject();
              e.eventType = type;
              el.fireEvent('on'+e.eventType, e);
          }
      }

    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
  </script>

</body>

</html>
