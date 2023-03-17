<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Website</title>
    <link rel="stylesheet" href="awais.css">
    <link rel="stylesheet" media="screen and (max-width: 720px)" href="phone.css">
    <!--<script src="awais.js"></script>!-->
</head>
<body>
    <header class="header">
        <div class="left">
            <img src="logo.jpg" alt="reload" width="100px">
            <div>Malik Fitness</div>
        </div>
        <div class="mid">
            <div class="navbar">
           <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Fitness calculator</a></li>
            <li><a href="#">Contact us</a></li>
           </ul>
        </div>
        </div>
        <div class="right">
            <button>Call us</button>
            <button>Email us</button>
        </div>
    </header>
    <div class="container">
        <h2>Join the best gym of Pakistan now</h2>
        <form action="project.php" method="post">
                <div>
                <input type="text" name="name" placeholder="Enter Your Name">
               </div>
               <div>
            <input type="number" name="age" placeholder="Enter Your Age">
               </div>
               <div>
            <input type="text" name="gender" placeholder="Enter Your Gender">
      </div>
       <div>
        <input type="text" name="locality" placeholder="Enter Your Locality">
       </div>
       <div>
        <input type="email" name="email" placeholder="Enter Your Email ID">
       </div>
       <div>
        <input type="phone" name= "phone" placeholder="Enter Your Phone Number">
       </div>
       <div class="save">
       <input type="Submit" value="Save">
       </div>
       
        </form>
    </div>
    <?php
    $a=$b=$c=$d=$e=$f="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST['name'] && $_POST['age'] && $_POST['gender'] && $_POST['locality']&& $_POST['email']&& $_POST['phone'])) {
            $a = $_POST['name'];
            $b = $_POST['age'];
            $c = $_POST['gender'];
            $d = $_POST['locality'];
            $e= $_POST['email'];
            $f= $_POST['phone'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "website";
             $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn) {
              die("connection Failed");
            }     
         $sql= "INSERT INTO joining(Name,Age,Gender,Locality,Email,phone) VALUES ('$a','$b','$c','$d','$e','$f')";
            if (mysqli_query($conn,$sql)) 
            header("location:after.html");
            else
                echo "Error:" . mysqli_error($conn);
            mysqli_close($conn);       
          }
        else
        echo "Provide data to add branch"; 
    } 
    ?>
     
</body>
</html>