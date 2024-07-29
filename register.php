<?php
// Establish database connection (replace placeholders with actual values)
$host = "localhost";
$username = "root";
$password = "";
$dbname = "food";

$conn = new mysqli ($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];

//if email alread exist
$email_check_query = "SELECT * FROM form WHERE email = '$email' LIMIT 1";
$result = $conn->query($email_check_query);
if($result->num_rows > 0) {
    echo"The Email alredy existed";
}
else{
$sql = "INSERT INTO form (firstname, lastname, email, gender, password) VALUES ('$firstname', '$lastname', '$email', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

} else {
    echo "There is an error : " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<style type="text/css">
  body{
    background-color: lightcyan;

  }
button{
  font-size: 36px;
}
</style>
<body>
<br><br><b>
  <center>
    Tap the button to login.</b><br><br>
    <button><a href="login.html">Login Now </a></button>
  </center>
</body>
</html>