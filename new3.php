<?php      
    $host = "localhost";  
    $user = "root";  
    $password = "root";  
    $db_name = "register";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }       
    $username = $_POST['Username'];  
    $password = $_POST['Password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM data where Username = '$username' and Password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Welcome </center></h1>"; 
            echo "<h1><center> 	$username</center></h1> ";
            echo "<center><h3><a href='user.html'>Continue</h3></a><center>";			
        }  
        else{  
            echo "<h1><center> Login failed. Invalid username or password.</center></h1>";  
        }     
?>