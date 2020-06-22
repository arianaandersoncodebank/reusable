<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/scroller/2.0.1/css/scroller.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>

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
//$arr=array();

//echo '<pre>';print_r($arr);echo '</pre>';
//$data=array('data'=>$arr);
//echo json_encode($data);
//mysqli_close($conn);
?>

<div style="overflow-x:auto;">
      <table class="" id="example" width="100%">
        <thead>
          <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Email</th>
         <th>City</th>
         <th>State</th>
         <th>Country</th>
         <th>Address1</th>
         <th>Address2</th>
         <th>Skill</th>
         <th>Status</th>
			
          </tr>
        </thead>
        <tbody style="font-size:12px" id="myTable">
		
		</tbody></table></div>
			
<script>
$(document).ready(function($) {
    $('#example').DataTable( {
        "ajax": "trial6.php/?q=get_trans_admin",
		"pageLength":50,
		 "paging": true,
         "deferRender": true,
         //"responsive": true,
		 //"processing": true,
         //"serverSide": true
    } );
} );

</script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/scroller/2.0.1/js/dataTables.scroller.min.js	" ></script>
			