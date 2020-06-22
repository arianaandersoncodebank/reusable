<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abhilasha";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for($i=1;$i<=10000;$i++){
$sql = "INSERT INTO users(name,mobile,email,city,state,country,address1,address2,skill,status)
VALUES ('demoname".$i."', 'mobile".$i."','email".$i."','city".$i."','state".$i."','country".$i."','address".$i."','address".$i."','skill".$i."',1)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>