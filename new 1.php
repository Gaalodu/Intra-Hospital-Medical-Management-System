<?php
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$gender = $_POST['Gender'];
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$password = $_POST['Password'];
	$Phone = $_POST['Phone'];
    $host = "localhost";  
    $user = "root";  
    $password = 'root';  
    $db_name = "register";  
	// Database connection
	$conn = new mysqli('localhost','root','root','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into data(firstName, lastName, gender, Username,Email,Phone,Password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssis", $firstName, $lastName, $gender,$Username, $email, $Phone,$password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>