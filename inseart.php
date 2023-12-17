<?php
    $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "register";  
      
$conn = mysqli_connect("localhost", "root", "root", "mysql");
if($conn === false){
die("ERROR: Could not connect. ");
. mysqli_connect_error());
}
 if (isset($_POST['submit'])) {
    if (isset($_POST['Firstname']) && isset($_POST['Lastname']) &&
        isset($_POST['Gender']) && isset($_POST['Username']) &&
        isset($_POST['Email']) && isset($_POST['phone'])) {
        
        $firstname = $_POST['FirstName'];
        $lastname = $_POST['Lastname'];
        $Gender = $_POST['Gender'];
        $username = $_POST['Username'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
		$Password = $_POST['Password'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "root";
        $dbName = "register";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssssis",$firstname,$lastname,$Gender,$username,$email,$phone,$Password);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>