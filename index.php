<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-sm fixed-top" id="navbar" style="background-color: rgb(87, 87, 87);">
            <div class="container-fluid" >
                <a class="navbar-brand text-white" href="./index.php" style="margin-bottom: 0.25rem; font-weight: 600;">myInvest.</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Navbar" id="togglerIcon">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center " id="Navbar">
                    <ul class="navbar-nav mr-auto" id="navigation">
                            <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
                    </ul>
                    <div class="navbar-nav ms-auto">
                        <li class="nav-item ">
                            <a href="./register.php" role="button" type="button" class="btn text-white btn-primary" id="registerBtn" >Sign Up</a>
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
                        <div class="card-header text-center"><h3>Sign In</h3></div>
                        <div class="card-body text-center">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input class="form-control" type="text" placeholder="Enter Username..." name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="form-control" type="password" placeholder="Enter Password..." name="password" style="margin-bottom: 2rem;" required>
                                </div>
                                <button class="btn btn-primary text-white" id="formBtn" type="submit" name="submit" >Submit</button>
                            </form>   
                            <nav>
                                <a href="register.php">Register for an account...</a>
                            </nav>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
        
        
    </main>
    
    <script src="./js/bootstrap.js"></script>
</body>
</html>


<?php 
session_start();

include ("connection.php");
include ("hashing.php");

if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass= $_POST['password'];
    $passHash = hashing($pass);
    $query = "SELECT * FROM registrationinfo WHERE registrationinfo.Username = '$user' && registrationinfo.Password = '$passHash'";
    $resultLogin = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($resultLogin)==0){
        echo '<h6 class="text-center" style="margin-top:1rem; color:red;">Incorrect username or password.</h6>';
    }
    else {
        header("Location: display.php");
        $arr = $resultLogin->fetch_assoc();
        $_SESSION['details'] = $arr;
        exit();
    }
    
    $resultLogin =null;

    mysqli_close($connect);
}
session_destroy();
?>