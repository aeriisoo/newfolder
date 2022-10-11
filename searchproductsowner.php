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
    body, .homeshopper::placeholder{
        font-family: 'Franklin Gothic', 'Arial Narrow', Arial, sans-serif;
    }

    .searchbar{
    margin-top: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .search-bar{
    background: #fff ;
    width: 100%;
    max-width: 800px;
    display: flex;
    padding: 2px;
    border-radius: 4px;
    }

    #select{
    background: #003a87;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color:#fff;
    width: 400px;
    padding: 0px 30px;
    cursor: pointer;
    position: relative;
    border-radius: 4px;
    }

    #select img{
    width: 15px;
    }

    #select ul{
    position:absolute;
    top: 100%;
    left: 0;
    list-style: none;
    background: #fff;
    color: #555;
    width: 100%;
    border-radius: 4px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s;
    }

    #select ul li{
    padding: 10px 20px;
    cursor: pointer;
    }

    .search-bar input{
    padding: 10px 25px;
    width: 800px;
    border: none;
    outline: none;
    font-size: 15px;
    }

    #select ul.open{
    max-height: 300px;
    }

    .viewallproduct{
    /*border: 2px solid rgb(58, 4, 255);*/
    padding-bottom: 50px;
    text-align: center;
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
    font-size: 12px;
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
    <a class="logo" href="homeowner.php" title="e-NIAGA"><img src="Source/1(1).svg"></a>
    <div class="iconbars"> 
    <a href="logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
    <a href="accownerviews.php" title="Account"><i class="fa-solid fa-user"></i></a>
    <a href="orderowner.php" title="Order"><i class="fa-solid fa-bag-shopping"></i></a>
    </div>
  </nav>

  <section class="searchbar">
    <!-- Filter Search -->
    <form action="searchproductsowner.php" method="get">
      <div class="search-bar">
          <div id="select" name="categories">
              <p id="selectText" name="categories">ALL CATEGORIES</p>
              <img src="source/arrows.png">
              <ul id="list" name="categories">  
                  <li class="options" name="categories">Foods</li>
                  <li class="options" name="categories">Services</li>
                  <li class="options" name="categories">Preloved</li>
                  <li class="options" name="categories">Clothes</li>
                  <li class="options" name="categories">Selfcare</li>
              </ul>
          </div>
          <input type="text" id="inputfield" name="search" placeholder="Search In All Categories">
      </div>
      <form>
  </section>

  <section class="viewallproduct" id="viewallproduct">
    <header class="availableproduct">
        AVAILABLE PRODUCTS
    </header>
    
    <div class="allproduct">
    <?php
      include ('connect.php');
      if(isset($_GET['search']))
      {
      $search=$_GET['search'];
      }

      $sql = "SELECT * FROM product where ProductName like '%$search%'";
      $result = $conn->query($sql);
      if($result->num_rows > 0) {
        while($row=mysqli_fetch_array($result)){
        echo "<div class='product'>
              <a href='viewproductowner.php?ProductID=".$row['ProductID']."'><img src='Products/".$row['ProductImage']."' alt='Image' width='200' height='200'></a>
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
  </section>

  <footer>
  </footer>

  <script>
    let select = document.getElementById("select");
    let list = document.getElementById("list");
    let selectText = document.getElementById("selectText");
    let inputfield = document.getElementById("inputfield");
    let options = document.getElementsByClassName("options");

    select.onclick = function(){
        list.classList.toggle("open");
    }

    for(option of options){
        option.onclick = function(){
            selectText.innerHTML = this.innerHTML;
            inputfield.placeholder = "Search In " + selectText .innerHTML;
        }
    }
    </script>

</body>

</html>
