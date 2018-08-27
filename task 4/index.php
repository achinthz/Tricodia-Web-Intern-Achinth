<html>
	<head>
		<title>PHP Example</title>
	</head>
	<body text-align="centre">
		<form  method="post">
			Name  : <input type="text" name="name"><br><br>
			E-mail: <input type="text" name="email"><br><br>
			<input type="submit" name="submit"  value="submit">
		</form>
		
		<a href="disp.php"><button>View Records</button></a>
<?php
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['submit']))
{
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS tempDB";
if ($conn->query($sql) === TRUE) {
     /*echo "<script type='text/javascript'>alert('Database created successfully')</script>";*/
} else {
    echo "<script type='text/javascript'>alert(Error creating database')</script>";
}
$dbname="tempDB";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE IF NOT EXISTS visited (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
email VARCHAR(50))";

if ($conn->query($sql) === TRUE) {
    /*echo "<script type='text/javascript'>alert('Table created')</script>";*/
} else {
    echo "Error creating table: " . $conn->error;
}

$name=$_POST['name'];
$email=$_POST['email'];
$sql="insert into visited(name,email) values ('".$name."','".$email."')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('New record created successfully')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
?>


</body>
</html>