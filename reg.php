<?php
// Retrieve form data
$Name = $_POST['Name'];
$gender = $_POST['gender'];
$Age = $_POST['Age'];
$Vaccine = $_POST['Vaccine'];
$Malaria = $_POST['Malaria'];
$Dengue = $_POST['Dengue'];
$Covid = $_POST['Covid'];
$BloodGroup = $_POST['BloodGroup'];

// Database connection settings
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database";

// Create a new database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO registration (Name, gender, Age, Vaccine, Malaria, Dengue, Covid, BloodGroup) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssss", $Name, $gender, $Age, $Vaccine, $Malaria, $Dengue, $Covid, $BloodGroup);
$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
header("Location: index.html");
?>
