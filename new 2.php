<?php
$Firstname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$Gender=$_POST['Gender'];
$Username=$_POST['Username'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Password=$_POST['Password'];
if (!empty($Firstname)||!empty($Lastname)||!empty($Firstname)||!empty($Gender)||!empty($Username)||!empty($Email)||!empty($Phone)||!empty($Password)){
 $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "register"; 
	$conn = new mysqli_connect("localhost", "root", "root", "mysql");
	if (mysqli_connect_error()){
		die('Connect_Error('.mysqli_connect_error()')'.mysqli_connect_error());
	}{
		else{
			$SELECT="SELECT Email From data Where Email=? Limit=1";
			$INSERT="INSERT Into data (Firstname,Lastname,Gender,Username,Email,Phone,Password)value(?,?,?,?,?,?,?,)";
			$stmt =$conn->prepare($SELECT);
			$stmt=->bind_param("s",$Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			if ($rnum==0){
				 $stmt->close();
				 $stmt=$conn->prepare($INSERT);
				 $stmt->bind_param)("sssssis",$Firstname,$Lastname,$Gender,$Username,$Email,$Phone,$Password);
				 $stmt->execute();
				 echo "new record is inserted successfully ";
			}else{
				echo "some one already registered through this mail";
			}
			$stmt->close();
            $stmt->close();  			
}else{
	echo"all feilds are required";
	die();
}
?>
	