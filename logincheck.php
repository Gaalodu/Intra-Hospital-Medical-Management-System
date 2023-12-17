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
    $KEY=$_POST['Role'];	
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 
        $KEY = mysqli_real_escape_string($con, $KEY);		
      
        $sql = "SELECT * FROM data where Username = '$username' and Password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
        if($count == 1){ 
		$KEY=$row['Role']; 
          if($KEY=='Admin'){		
		  
            echo "<h1><center> Welcome to Admin dashboard </center></h1>"; 
            echo "<h1><center> 	$username</center></h1> ";	
			echo "<center><h3><a href='admindashboard.html'>Getin</h3></a><center>";
            }  
               else{  
            echo '<h1><center><script>alert(" Users dosent have access.")</script> </center></h1>'; 
                   echo "<center><h3><a href='blog-archive.html'>Back</h3></a><center>";			
              } 
		} else{
                echo "<h1><center>something	went wrong</h1><center>";
				    echo "<center><h3><a href='blog-archive.html'>Ok</h3></a><center>";
		}				
?>