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
    text-align: center;
    }

    button[type=submit] {
      background-color: #003a87;
      color: white;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      margin: 20px 20px 40px 20px;
      width: 30%;
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
  <?php
    session_start();

    include ("connect.php");

    $username= $_SESSION['username'];
    $password= $_SESSION['password'];

    $sql= "SELECT * FROM customer where Username = '$username' and Password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
	    while ($row = $result->fetch_assoc())
	    {

    echo "<header class='myorder'>MY ACCOUNT</header>

    <div class='myorderwrap'>
        <div class='registerform'>
            <form class='registercontainer'  method='POST' action='accshopper.php'>
            <img src='Source/icon2.svg' style='border-radius: 50%; width: 170px; height: 170px;' alt='Avatar'>
            <h1>ACCOUNT DETAILS</h1>
            <hr style='width: 90%; margin-bottom: 30px;'>
            
            <div>
              <label for='name'>Name</label>
              <input type='text' name='name' value='".$row['Name']."'>
            </div><br>

            <div>
              <label for='mnum'>Matric Number</label>
              <input type='text' name='mnum' value='".$row['MatricNo']."' readonly='readonly'>
            </div><br>

            <div>
              <label for='pnum'>Phone Number</label>
              <input type='text' name='pnum' value='".$row['PhoneNo']."'>
            </div><br>

            <div>
              <label for='address'>Address</label>
              <input type='text' name='address' value='".$row['Address']."'>
            </div><br>

            <div>
              <label for='uname'>Username</label>
              <input type='text' name='uname' value='".$row['Username']."'>
            </div><br>

            <h1 id='changepassowner'>CHANGE PASSWORD</h1>
            <hr style='width: 90%; margin-bottom: 30px;'>

            <div>
              <label for='pword'>Old Password</label>
              <input type='text' name='pword'>
            </div><br>

            <div>
              <label for='pword'>New Password</label>
              <input type='text' name='nword'>
            </div><br>

            <div>
              <label for='pword'>Confirm Password</label>
              <input type='text' name='cword'>
            </div><br>
            
            <button class='button btn' type='submit'>UPDATE</button>
            </form>
        </div>
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
