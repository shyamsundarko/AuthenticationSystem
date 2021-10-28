<?php 
function hashing($pass)
{
    $total=0;
    for($i=0; $i<strlen($pass);$i++)
    {
        $character = $pass[$i];
        $total += ord($character)*(pow(2,$i));
    }
    return $total;
}

?>