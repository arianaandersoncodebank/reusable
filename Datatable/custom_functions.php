<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geotabs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}*/
include('config.php');



if(isset($_REQUEST['action']) && $_REQUEST['action']!=''){
	$action = $_REQUEST['action'];
	switch($action){
		case 'get_countries':get_countries();break;
		case 'add_country':add_country();break;
		case 'get_country_by_id':get_country_by_id();break;
		case 'update_country':update_country();break;
		case 'delete_country':delete_country();break;
		
		case 'get_states':get_states();break;
        case 'add_state':add_state();break;
		case 'get_state_by_id':get_state_by_id();break;
		case 'update_state':update_state();break;
		case 'delete_state':delete_state();break;
		
		case 'get_states_by_country_id':get_states_by_country_id();break;	
			
		case 'get_cities':get_cities();break;	
        case 'add_city':add_city();break;
		case 'get_city_by_id':get_city_by_id();break;
		case 'update_city':update_city();break;
		case 'delete_city':delete_city();break;		
		
		case 'get_constants_list':get_constants_list();break;
		case 'get_constant_by_id':get_constant_by_id();break;
		case 'add_lang_constant':add_lang_constant();break;
		case 'edit_lang_constant':edit_lang_constant();break;
		case 'delete_lang_constant':delete_lang_constant();break;
		
		case 'get_checklist_fields':get_checklist_fields();break;
		case 'add_checklist_fields':add_checklist_fields();break;
		case 'edit_checklist':edit_checklist();break;
		case 'update_checklist_fields':update_checklist_fields();break;
		case 'delete_checklist_fields':delete_checklist_fields();break;
		
		case 'add_checklist_formdetails':add_checklist_formdetails();break;
		
		
	}
}

function get_countries(){
	global $conn;	
	
	$sql = "SELECT * FROM countries order by name";
	$result = mysqli_query($conn, $sql);
    $arr=array();
	$txt='';$i=1;
	if(mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			/*$txt .='<tr rowid="'.$row->id.'">';
			$txt .='<td>'.$i.'</td>';
			$txt .='<td>'.$row->name.'</td>';
			$txt .='<td><a href="javascript:void(0)" onclick=edit("'.$row->id.'")><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")><i class="fa fa-times"></i></a></td>';
			$txt .='</tr>';
			//$arr[]=$row;*/
			
			$link='<a href="javascript:void(0)" onclick=edit("'.$row->id.'")><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")><i class="fa fa-times"></i></a>';
			
			$arr[]=array($i,$row->name,$link);
			$i++;
		}
	}
	else {
       echo "0 results";
    }
	//echo $txt;
	$data=array('data'=>$arr);
    echo json_encode($data);
}
function get_states(){
	global $conn;	
	
	$sql = "SELECT s.*,c.name as country_name FROM states as s inner join countries as c on s.country_id=c.id order by c.name,s.name";
	$result = mysqli_query($conn, $sql);
    $txt='';$i=1;
	if (mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			/*$txt .='<tr rowid="'.$row->id.'">';
			$txt .='<td>'.$i.'</td>';
			$txt .='<td>'.$row->country_name.'</td>';
			$txt .='<td>'.$row->name.'</td>';
			$txt .='<td><a href="javascript:void(0)" onclick=edit("'.$row->id.'")>
			<i class="fa fa-pencil"></i></a>
			<a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")>
			<i class="fa fa-times"></i></a></td>';
			$txt .='</tr>';*/
			$link='<a href="javascript:void(0)" onclick=edit("'.$row->id.'")>
			<i class="fa fa-pencil"></i></a>
			<a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")><i class="fa fa-times"></i></a>';
			$arr[]=array($i,$row->country_name,$row->name,$link);
			$i++;
		}
	}
	else {
       echo "0 results";
    }
	//echo $txt;
	$data=array('data'=>$arr);
    echo json_encode($data);
}
function get_states_by_country_id(){
	global $conn;
	$country_id = $_REQUEST['country_id'];
	
	$sql = "SELECT * FROM states where country_id=".$country_id;
	$result = mysqli_query($conn, $sql);
    $txt='<option value="">Select State</option>';
	if (mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			//$states[$row->country_id][$row->id] = $row->name;
			$txt .='<option value="'.$row->id.'">'.$row->name.'</option>';
		}
	}
	echo $txt;
}

function get_cities(){
	global $conn;
		
	$sql = "SELECT ct.*,s.name as state_name,c.name as country_name FROM cities as ct inner join states as s on ct.state_id=s.id inner join countries as c on s.country_id=c.id order by c.name,s.name,ct.name ";
	$result = mysqli_query($conn, $sql);
   // $txt='<option value="">Select</option>';
		$txt='';$i=1;
	if (mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			
			
			/*$txt .='<tr rowid="'.$row->id.'">';
			$txt .='<td>'.$i.'</td>';
			$txt .='<td>'.$row->country_name.'</td>';
			$txt .='<td>'.$row->state_name.'</td>';
			$txt .='<td>'.$row->name.'</td>';
			$txt .='<td><a href="javascript:void(0)" onclick=edit("'.$row->id.'")><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")>
			<i class="fa fa-times"></i></a></td>';
			$txt .='</tr>';
			//$arr[]=$row;*/
			
			$link='<a href="javascript:void(0)" onclick=edit("'.$row->id.'")><i class="fa fa-pencil"></i></a><a href="javascript:void(0)" onclick=confirmDelete("'.$row->id.'")>
			<i class="fa fa-times"></i></a>';
			
			$arr[]=array($i,$row->country_name,$row->state_name,$row->name,$link);
			
			$i++;
		}
	}
	else {
       echo "0 results";
    }
	$data=array('data'=>$arr);
    echo json_encode($data);
}

function get_constants_list(){
	global $conn;
	$sql = "SELECT * FROM language_constants";
	$result = mysqli_query($conn, $sql);

	$arr=array();
    $i=1;
	if (mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			//$arr[] = $row;
			$link='<a href="javascript:void(0)" onclick=edit_lang_modal("'.$row->id.'")>
			<i class="fa fa-pencil"></i></a>
			<a href="javascript:void(0)" onclick=delete_lang_modal("'.$row->id.'")><i class="fa fa-times"></i></a>';
			
			$arr[]=array($i,$row->constant_name,$row->english,$row->german,$row->romanian,$row->italian,$link);
			$i++;			
		}
	}
	else {
       echo "0 results";
    }
	
    $data=array('data'=>$arr);
    echo json_encode($data);

}
function get_constant_by_id(){
	global $conn;
	$id  = $_POST['id'];
	$sql = "SELECT * FROM language_constants where id=".$id;
	$result = mysqli_query($conn, $sql);

	
    $row=array();
	if (mysqli_num_rows($result) > 0) {  
		$row = mysqli_fetch_array($result); 
	}
	//mysqli_close($conn);
  echo json_encode($row);
}
function add_lang_constant(){
	global $conn;
	$constant_name 	= $_POST['constant_name'];
	$english  		= $_POST['english'];
	$german 		= $_POST['german'];
	$romanian 		= $_POST['romanian'];
	$italian 		= $_POST['italian'];
	
	$sql = "INSERT INTO language_constants (constant_name, english, german,romanian,italian)
VALUES ('".$constant_name."','".$english."','".$german."','".$romanian."','".$italian."')";

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}

function edit_lang_constant(){
	global $conn;
	$constant_name 	= $_POST['constant_name'];
	$english  		= $_POST['english'];
	$german 		= $_POST['german'];
	$romanian 		= $_POST['romanian'];
	$italian 		= $_POST['italian'];
	$id 			= $_POST['id'];
	
	$sql = 'UPDATE language_constants SET constant_name="'.$constant_name.'", english="'.$english.'",german="'.$german.'",romanian="'.$romanian.'",italian="'.$italian.'" WHERE id='.$id;


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}

function delete_lang_constant(){
	global $conn;	
	$id 	= $_POST['id'];
	$sql = "DELETE FROM language_constants WHERE id=".$id;
	


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}

/*************checklist*************************/

function get_checklist_fields(){
	global $conn;
	$sql = "SELECT * FROM checklist_fields where is_delete=0";
	$result = mysqli_query($conn, $sql);

	$txt='';

	if(mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{   $fields_arr = json_decode($row->fields_arr,true);
			$txt .='<div class="col-md-7 heading">'.$row->field_header.' <a class="pull-right" href="javascript:void(0)" onclick=confirm_delete_checklist_modal('.$row->id.')><i class="fa fa-times"></i></a>&nbsp;&nbsp;<a class="pull-right" href="javascript:void(0)" onclick=edit_checklist('.$row->id.')><i class="fa fa-pencil"></i></a>
			</div>';
			foreach($fields_arr as $f){
				$txt .= '<div class="col-md-7 field_div">'.$f.'</div>';
			}
		}
	}
	//mysqli_close($conn);
  echo $txt;

}

function edit_checklist(){
	global $conn;
	$id  = $_POST['id'];
	$sql = "SELECT * FROM checklist_fields where id=".$id;
	$result = mysqli_query($conn, $sql);

	
 $txt ='';
	if(mysqli_num_rows($result) > 0) {  
		$row = mysqli_fetch_object($result); 
		$fields_arr=json_decode($row->fields_arr,true);
		
		$txt .='<input type="hidden" name="id" value="'.$row->id.'">';
		$txt .='<div class="row form-group">
				    <div class="col-md-3">
					   <label for="firstName">Field Heading</label>
					</div>
					<div class="col-md-9">
						<input name="field_header" type="text" placeholder="Enter Field Heading" class="form-control" maxlength="255" value="'.$row->field_header.'">
					</div>
                </div>';
				
		foreach($fields_arr as $k=>$f){
		  
            $txt .='<div class="row form-group">
				  <div class="col-md-3">
					<label for="lastName">Field Name</label>
				  </div>
				  <div class="col-md-8">	
					 <input name="fields_arr[]" type="text" placeholder="Enter Field Name" class="form-control fields_arr" value="'.$f.'" maxlength="255">
				  </div>';
			if($k==0){
				$txt .='<div class="col-md-1">	
					  <a href="javascript:void(0)" onclick=add_field("editCheckModal")><i class="fa fa-plus"></i></a>
				  </div>';
			  }
			else{
				$txt .='<div class="col-md-1">	
				<a href="javascript:void(0)" onclick="$(this).parents(\'.row\').remove()"><i class="fa fa-times"></i></a>
			</div>';
				
			}			
				 
            $txt .='</div>';
			
		}
	}
	//mysqli_close($conn);
  echo $txt;
}

function update_checklist_fields(){
	global $conn;
  $id				= $_POST['id'];
  $field_header		= $_POST['field_header'];
  $fields_arr		= json_encode($_POST['fields_arr']);
  
  $sql = "UPDATE checklist_fields SET field_header='".$field_header."', fields_arr='".$fields_arr."' WHERE id=".$id;


if(mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

	
}


function add_checklist_fields(){
	global $conn;
	$field_header 	= $_POST['field_header'];
	$fields_arr  	= $_POST['fields_arr'];
	
	$fields_arr = json_encode($fields_arr);
	
	$sql = "INSERT INTO checklist_fields (field_header, fields_arr)
VALUES ('".$field_header."','".$fields_arr."')";

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


function delete_checklist_fields(){
	global $conn;	
	$id 	= $_POST['id'];
	//$sql = "DELETE FROM checklist_fields WHERE id=".$id;
	$sql = "UPDATE checklist_fields SET is_delete=1 WHERE id=".$id;
	


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}


function add_checklist_formdetails(){
	global $conn;
	$driver_id 	    = $_POST['driver_id'];
	//$date 	    	= date('Y-m-d H:i:s');
	$date 	    	= $_POST['date_sel'];
	$id 	    	= $_POST['id'];
	$detail  	    = json_encode($_POST);
	
	$detail=json_encode($detail);
	
	//echo '<pre>';print_r($_POST);die;
		
	$sql = "SELECT * FROM checklist where driver_id='".$driver_id."' and date like'".$date."%'";
	$result = mysqli_query($conn, $sql);
	 //echo $sql;die;  
	if (mysqli_num_rows($result) > 0) {  
	    $sql = "update checklist set driver_id='".$driver_id."',date='".$date."',detail='".$detail."' where id=".$id;
	}
	else{
		$sql = "INSERT INTO checklist (driver_id, date,detail)
	VALUES ('".$driver_id."','".$date."','".$detail."')";
	}
		
	//echo $sql;die;
	
	if (mysqli_query($conn, $sql)) {
	  echo 1;
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


/***********Driver************************/
/*function get_drivers_list(){
	global $conn;
	$sql = "SELECT * FROM drivers";
	$result = mysqli_query($conn, $sql);

	$arr=array();

	if (mysqli_num_rows($result) > 0) {  
		while($row = mysqli_fetch_object($result)) 
		{
			$arr[] = $row;
		}
	}
	//mysqli_close($conn);
  echo json_encode(array('data'=>$arr));

}

function add_driver(){
	global $conn;
	$firstName 		= $_POST['firstName'];
	$lastName  		= $_POST['lastName'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$is_driver 		= 1;
	
	$sql = "INSERT INTO users (firstName, lastName, email,password,is_driver)
VALUES ('".$firstName."','".$lastName."','".$email."','".$password."','".$is_driver."')";

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}

function edit_driver(){
	global $conn;
	$firstName 		= $_POST['firstName'];
	$lastName  		= $_POST['lastName'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$id 			= $_POST['id'];
	
	$sql = 'UPDATE users SET firstName="'.$firstName.'", lastName="'.$lastName.'",email="'.$email.'",password="'.$password.'" WHERE id='.$id;


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}

function delete_driver(){
	global $conn;	
	$id 	= $_POST['id'];
	$sql = "DELETE FROM users WHERE id=".$id;
	


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}*/

function add_country(){
	global $conn;
	$country_name 	= $_POST['country_name'];	
	
	$sql = "INSERT INTO countries(name)VALUES ('".$country_name."')";

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}
function add_state(){
	global $conn;
	$state_name 	= $_POST['state_name'];	
	$country_id 	= $_POST['country_id'];	
	
	 $sql = "INSERT INTO states(name,country_id)VALUES ('".$state_name."',".$country_id.")";

	if (mysqli_query($conn, $sql)) {
	  echo 1;
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



function get_country_by_id(){
	global $conn;
	$id  = $_POST['id'];
	$sql = "SELECT * FROM countries where id=".$id;
	$result = mysqli_query($conn, $sql);

	
    $row=array();
	if (mysqli_num_rows($result) > 0) {  
		$row = mysqli_fetch_array($result); 
	}
	//mysqli_close($conn);
  echo json_encode($row);
}
function get_state_by_id(){
	global $conn;
	$id  = $_POST['id'];
	$sql = "SELECT * FROM states where id=".$id;
	$result = mysqli_query($conn, $sql);

	
    $row=array();
	if (mysqli_num_rows($result) > 0) {  
		$row = mysqli_fetch_array($result); 
	}
	//mysqli_close($conn);
  echo json_encode($row);
}
function get_city_by_id(){
	global $conn;
	$id  = $_POST['id'];
	$sql = "SELECT ct.*,s.id as state_id,c.id as country_id FROM cities as ct inner join states as s on ct.state_id=s.id inner join countries as c on s.country_id=c.id where ct.id=".$id;
	//$sql = "SELECT * FROM cities where id=".$id;
	$result = mysqli_query($conn, $sql);

	
    $row=array();
	if(mysqli_num_rows($result) > 0) {  
		$row = mysqli_fetch_array($result); 
	}
	//mysqli_close($conn);
  echo json_encode($row);
}


function update_country(){
  global $conn;
  
  $id				= $_POST['id'];
  $name				= $_POST['country_name'];
  
  $sql = "UPDATE countries SET name='".$name."' WHERE id=".$id;


if(mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
function update_state(){
  global $conn;
  
  $id				= $_POST['id'];
  $country_id		= $_POST['country_id'];
  $state_name		= $_POST['state_name'];
  
  $sql = "UPDATE states SET name='".$state_name."',country_id=".$country_id." WHERE id=".$id;


if(mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


function delete_state(){
	global $conn;	
	$id 	= $_POST['id'];
	$sql 	= "DELETE FROM states WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}
function delete_country(){
	global $conn;	
	$id 	= $_POST['id'];
	$sql 	= "DELETE FROM countries WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}
/*****************City*********/
function add_city(){
	global $conn;
	$city_name 	= $_POST['city_name'];	
	$state_id 	= $_POST['state_id'];	
	
	$sql = "INSERT INTO cities(name,state_id)VALUES ('".$city_name
	."',".$state_id.")";

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


function update_city(){
  global $conn;
  
  $id				= $_POST['id'];
  $state_id		= $_POST['state_id'];
  $city_name		= $_POST['city_name'];
  
  $sql = "UPDATE cities SET name='".$city_name."',state_id=".$state_id." WHERE id=".$id;


if(mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

function delete_city(){
	global $conn;	
	$id 	= $_POST['id'];
	$sql 	= "DELETE FROM cities WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//mysqli_close($conn);
}
?>