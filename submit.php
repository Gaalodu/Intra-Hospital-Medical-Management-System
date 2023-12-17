<?php      
    $host = "localhost";  
    $user = "root";  
    $dbpassword = "root";  
    $db_name = "register";  
      
$conn = mysqli_connect("localhost", "root", "root", "register");
if (isset($_POST['sendmessage'])) {
  // receive all input values from the form
    extract($_POST['sendmessage']);
 $Firstname=$_POST['Name'];
$Lastname=$_POST['Email'];
$Gender=$_POST['Sub'];
$Username=$_POST['comment'];


$sql= "INSERT INTO feedback(Name,Email,Subject,Feedback)
                            VALUES('$Firstname','$Lastname','$Gender','$Username')";
             
}
if (mysqli_query($conn,$sql)){
echo '<center><h1><script>alert(" Thankyou ,your  Feedback recorded successfully")</script></h1></center>';
echo "<center><h3><a href='contact.html'>Back</h3></a><center>";
} else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>