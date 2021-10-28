<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Registration</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-sm fixed-top" id="navbar" style="background-color: rgb(87, 87, 87);">
            <div class="container-fluid" >
                <a class="navbar-brand text-white" href="./index.php" style="margin-bottom: 0.25rem; font-weight: 600;">myInvest.</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navbar" id="togglerIcon">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="Navbar">
                    <ul class="navbar-nav mr-auto" id="navigation">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    </ul>
                    <div class="navbar-nav ms-auto">
                        <li class="nav-item ">
                            <a href="./index.php" role="button" type="button" class="btn text-white btn-primary" id="loginBtn" >Sign In</a>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container" id="signInContainer">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="card" style="width: 25rem;">
                        <div class="card-header text-center"><h3>Sign Up</h3></div>
                        <div class="card-body text-center">
                            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input class="form-control" type="text" placeholder="Enter Name..." name="name" required>      
                                </div>
                                <div class="form-group">
                                    <label>Age:</label>
                                    <input class="form-control" type="number" placeholder="Enter Age..." name="age" id="age" required> 
                                </div>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input class="form-control" type="text" placeholder="Enter Username..." name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="form-control" type="password" placeholder="Enter Password..." name="password" required style="margin-bottom: 2rem;">
                                </div>
                                <button class="btn btn-primary text-white" type="submit" name="submit" value="submit">Register</button>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </main>

</body>
</html>


<?php

include('connection.php');

include('hashing.php');
if (isset($_POST['submit'])) 
{
    $name1 = $_POST['name'];
    $age1 = $_POST['age'];
    $user1 = $_POST['username'];
    $pass1 = $_POST['password'];
    $result = 0;
    $hashPass1 = hashing($pass1);
    $query1 = "INSERT INTO registrationinfo(Name,Age,Username,Password) VALUES('$name1','$age1','$user1','$hashPass1')";
    $result = mysqli_query($connect, $query1);
    mysqli_close($connect);
    echo "<script>location.href = './index.php';</script>";
 
}
?>
   

   


