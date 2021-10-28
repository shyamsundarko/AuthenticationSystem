<?php
    if(isset($_POST['submit']))
    {
        $servername = 'localhost';
        $username = 'shambu';
        $password = 'shyam12345';
        $connect = mysqli_connect($servername, $username, $password, 'userdetails');
        
        if(!$connect){
            echo 'Unable to connect. Error message: '.mysqli_error();
        }
    }

?>