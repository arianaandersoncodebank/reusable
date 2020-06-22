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

$sql = "SELECT * from users";
$result = mysqli_query($conn, $sql);
$arr=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       //$arr[]=$row;
	   $arr[] = array($row['id'],$row['name'],$row['mobile'],$row['email'],$row['city'],$row['state'],$row['country'],$row['address1'],$row['address2'],$row['skill'],$row['status']);
    }
} else {
    echo "0 results";
}
//echo '<pre>';print_r($arr);echo '</pre>';
$data=array('data'=>$arr);
echo json_encode($data);
mysqli_close($conn);
?>