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
               <h1>Login</h1>
               </ul>
            </div>
            </div>
        </header>
        <div class="container">
        <form action="login.php" method="post">
        Email: <input type="text" name="email" required>
        <br>
        Password: <input type="password" name="password" required>
        <br>
       <input type="submit" value="Login">
        </form>
        </div>
        <?php
      $em= $ps= "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['email'] || $_POST['password'])) {

                $em = $_POST['email'];
                $ps = $_POST['password'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "website";

                $conn = mysqli_connect($servername, $username, $password, $database);
                if (!$conn) {
                    die("connection failed!");
                }
                $sql = "SELECT Email, Password FROM login WHERE Email='$em'";
                $result = mysqli_query($conn, $sql);
                if(!$result)
                {
                    echo "Error:" . mysqli_error($conn);
                }
                else
                {
                    $row = mysqli_fetch_assoc($result);
                    $match_em = $row ["Email"];
                    $match_ps = $row ["Password"]; 
                    if (!(strcasecmp($match_em, $em)) && !(strcasecmp($match_ps, $ps)) ) {
                        echo "Login Success!";
                        header("location:project.php");
                    }  
                    else {
                        echo "Incorrect Email or Password!";
                    }
                }
                mysqli_close($conn);                        
            }
            else {
                echo "Empty Email or Password!";
            }
        }      
               ?>
    </body>
</html>