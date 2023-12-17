<?php      
    $host = "localhost";  
    $user = "root";  
    $dbpassword = "root";  
    $db_name = "register";  
      
$conn = mysqli_connect("localhost", "root", "root", "register");
if (isset($_POST['submit'])) {
  // receive all input values from the form
    extract($_POST['submit']);
 $Firstname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$Gender=$_POST['Gender'];
$Username=$_POST['Username'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Role=$_POST['Role'];
$Password=$_POST['Password'];


$sql= "INSERT INTO data(Firstname,Lastname,Gender,Username,Email,Phone,Role, Password)
                            VALUES('$Firstname','$Lastname','$Gender','$Username','$Email','$Phone','$Role','$Password')";
             
}
if (mysqli_query($conn,$sql)){
echo "<center><h1>Registered successfully.</h1></center>";
echo "<center><h3><a href='index.html'>Home</h3></a><center>";
} else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>