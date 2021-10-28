<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fundsTrack HomePage</title>
</head>
<body>
    <div class="container" style="padding:2rem">
        <div class="row justify-content-center">
            <div class="col-auto" style="align-items=center">
                <h1 style="font-weight=700; font-size: 12rem;">Welcome, 
                <?php 
                session_start();
                $arr = $_SESSION['details'];
                echo $arr['Name'];
                session_destroy();
                ?></h1>
            </div>
        </div>
    </div>

</body>
</html>