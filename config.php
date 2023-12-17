<?php
    $host = "localhost";  
    $user = "root";  
    $dbpassword = 'root';  
    $db_name = "register";  
      
$conn = mysqli_connect("localhost", "root", "root", "register");
    extract($_POST['submit']);
 $Firstname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$Gender=$_POST['Gender'];
$Username=$_POST['Username'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Password=$_POST['Password'];
    $file=fopen("form-save.txt","a");

    fwrite($file,$Firstname );
    fwrite($file, $Lastname );
    fwrite($file,$Gender);
    fwrite($file,$Username);
    fwrite($file, $Email);
    fwrite($file,$Phone);
	fwrite($file,$password);
   
   fclose($file);
   echo "Registration successful "
 ?>
