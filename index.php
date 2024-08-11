

<?php
include("login.php");


if(isset($_POST["submit"]))
{
    $username= $_POST["username"];
    $password= $_POST["password"];

    if(empty($username))
    {
        echo "Username is missing";
    }
    else{
        echo "Hii {$username}";
    }
}

?>