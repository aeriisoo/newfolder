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
    margin: 0px auto 30px auto;
    min-height: 100px;
    overflow: hidden;
    }

    section{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    line-height: 1.618em;
    }

    .uploadcontainer{
    text-align: center;
    padding: 50px 0 30px 0;
    }

    .uploadcontainer label {
    width: 20%;
    margin-left: 15%;
    font-size: 18px;
    float: left;
    text-align: left;
    }

    .uploadcontainer input, select, textarea{
    padding: 7px 10px;
    width: 45%;
    background-color: rgb(244, 244, 244);
    border: 1px solid black;
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

    .iconbars a{
      color: #003a87;
      float: right;
      font-size: 25px;
      margin:5px 7px;
    }

    textarea{
      font-family: Arial;
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
      UPDATE PRODUCT
    </header>

    <?php
    session_start();

    include ("connect.php");

    $username= $_SESSION['username'];
    $password= $_SESSION['password'];
    $productid = $_GET['ProductID'];
    $sql= "SELECT * FROM product where ProductID=$productid";

    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
	    while ($row = $result->fetch_assoc())
	    {
    echo "<div class='myorderwrap'>
        <form class='uploadcontainer'  method='POST' action='updateproduct.php?ProductID=".$row['ProductID']."'>
            <div>
              <label for='name'>Product Image</label>
              <img src='Products/".$row['ProductImage']."' style='width: 170px; height: 170px;' alt='Avatar'>
            </div><br>

            <div>
              <label for='name'>Product Name</label>
              <input type='text' name='pname' value='".$row['ProductName']."'>
            </div><br>

            <div>
              <label for='mnum'>Category</label>
              <input type='text' name='category' value='".$row['Category']."' readonly>    
            </div><br>

            <div>
              <label for='pprice'>Price</label>
              <input type='text' name='pprice' value='".$row['ProductPrice']."'>
            </div><br>

            <div>
              <label for='pquantity'>Quantity</label>
              <input type='text' name='pquantity' value='".$row['Quantity']."' >
            </div><br>

            <div>
              <label for='pdesc'>Description</label>
              <textarea type='text' name='pdesc' style='resize:none'>".$row['Descriptions']."</textarea> 
            </div><br>

            <button type='submit' value='Back' formaction='/e-Niaga/productowner.php'>BACK</button>
            <button type='submit' value='Back' formaction='/e-Niaga/deleteproduct.php?ProductID=".$row['ProductID']."'>DELETE</button>
            <button type='submit'>UPDATE</button>
        </form>
    </div>";
  }}
  else
  {
      echo "0 results";	
  } 
  $conn->close();
?>

  </section>

</body>

</html>
