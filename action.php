<?php
    $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "register";  
	$conn = new mysqli_connect('localhost','root','root','register');
$data_file = fopen("result.txt",'w');

$Firstname=$POST["Firstname"];
$Lastname=$POST["Lastname"];
$Gender=$POST["Gender"];
$Username=$POST["Username"];
$Email=$POST["Email"];
$Phone=$POST["Phone"];
$Password=$POST["password"];
$text_to_write= $Firstname ,$Lastname,$Gender,$Username,$Email,$Phone,$Password.
fwrite($data_file,$text_to_write);
echo "registration made successful";
fclose($data_file);
	}
?>