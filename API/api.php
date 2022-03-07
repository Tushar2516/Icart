<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT');
//header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
header('Access-Control-Allow-Headers: Content-Type');

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "shopping_cart"; /* Database name */
/* $dbname = "online_shop";  Database name */


$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


$request = isset($_REQUEST['request'])?$_REQUEST['request']:"";

// Register API
if($request == "register")
{
	$data = json_decode(file_get_contents("php://input"));
	$first_name = $data->password;
	//echo "f name::".$first_name;
	//echo "<pre>";
	//print_r($_REQUEST);
	//exit;
	$first_name = isset($data->fname)?$data->fname:"";
	$last_name = isset($data->lname)?$data->lname:"";
	$email = isset($data->email)?$data->email:"";
	$password =isset($data->password)?md5($data->password):"";
	
	if( !empty($first_name) &&  !empty($last_name) || !empty($email) || !empty($password)){
		  $check_userData = mysqli_query($con,"select email as user_name from login_user where email ='".$email."'");
		  if(mysqli_num_rows($check_userData) == 0){
			  $insert_review=mysqli_query($con,"INSERT INTO  login_user (first_name,last_name,email,password) VALUES('".$first_name."','".$last_name."','".$email."','".$password."')");
			  $response=array("status"=>"success","register_user_id"=>mysqli_insert_id($con));
		  }else{
			  $response=array("status"=>"fail","message"=>"Email is already registered please try another email id");
		  }
	}else{
		$response=array("status"=>"fail","message"=>"Please pass all field for register");
	}
  echo json_encode($response);
  exit;
}

// Login API
if($request == "login")
{
	$data = json_decode(file_get_contents("php://input"));
	
	$email = isset($data->email)?$data->email:"";
	$password =isset($data->password)?md5($data->password):"";
	
	if( !empty($email) &&  !empty($password) ){
		  //$userData = mysqli_query($con,"select first_name,last_name,email as user_name from login_user where email ='".$email."' AND password='".$password."'");
		  $userData = mysqli_query($con,"select user_id from login_user where email ='".$email."' AND password='".$password."'");
		  $login_user_data = array();
		  if(mysqli_num_rows($userData)> 0){
			  while($row = mysqli_fetch_assoc($userData)){
				  $loggedInuserId = $row['user_id'];
				//$login_user_data[] = $row;
			  }
			  $response=array("status"=>"success","login_user_id"=>$loggedInuserId);
		  }else{
			  $response=array("status"=>"fail","message"=>"Incorrect username and password , please try another time");
		  }
	}else{
		$response=array("status"=>"fail","message"=>"Please pass all field for login");
	}
  echo json_encode($response);
  exit;
}


// Fetch All Products records
if($request == 1)
{
  $userData = mysqli_query($con,"select * from product order by id desc");

  $response = array();
  while($row = mysqli_fetch_assoc($userData)){
    $response[] = $row;
  }

  echo json_encode($response);
  exit;
}

// Create Review API
if($request == 2)
{
	$product_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:"";
	$name = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$comment =isset($_REQUEST['comment'])?$_REQUEST['comment']:"";
	
	if( !empty($product_id) &&  !empty($name) || !empty($rating) || !empty($comment)){
		  $insert_review=mysqli_query($con,"INSERT INTO comments (product_id,name,comment) VALUES('".$product_id."','".$name."','".$comment."')");
		  $response=array("status"=>"success","insert_review_id"=>mysqli_insert_id($con));
	}else{
		$response=array("status"=>"fail","message"=>"Please pass all field for add review");
	}
  echo json_encode($response);
  exit;
}

// GET Review API
if($request == 3)
{
	$product_id = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:"";
	if( !empty($product_id)){
		  $reviewData = mysqli_query($con,"select * from comments WHERE product_id='".$product_id."' order by comment_id desc");
		  $response = array();
		  while($row = mysqli_fetch_assoc($reviewData)){
			$response[] = $row;
		  }
	}else{
		$response=array("status"=>"fail","message"=>"Please pass product id for review");
	}
  echo json_encode($response);
  exit;
}

// Create Order API
if($request == 4)
{
	$data = json_decode(file_get_contents("php://input"));
	
	$user_id = isset($data->userId)?$data->userId:"";
	$name = isset($data->name)?$data->name:"";
	$mobile_no =isset($data->mobile)?$data->mobile:"";
	$address =isset($data->address)?$data->address:"";
	$order_total =100;
	
	/*echo "user id::".$user_id;
	echo "name::".$name;
	echo "mobile no::".$mobile_no;
	echo "address::".$address;
	echo "name::".$order_total;
	*/
	if( !empty($user_id) && !empty($name) && !empty($mobile_no) )
	{	
		//echo "inside if";
		//exit;
		 $insert_order=mysqli_query($con,"INSERT INTO product_order (user_id,name,mobile_no,address,order_total) VALUES('".$user_id."','".$name."','".$mobile_no."','".$address."','".$order_total."')");
		 $order_id =mysqli_insert_id($con);
		 /*for($i=0; $i<count($product_id); $i++)
		 {
			 $product_id_data =$product_id[$i];
			 $qty_data =$qty[$i];
			 $price_data =$price[$i];
			 $insert_review=mysqli_query($con,"INSERT INTO  product_order_qty (order_id,product_id,qty,price) VALUES('".$order_id."','".$product_id_data."','".$qty_data."','". $price_data."')");
		 }*/
		 $response=array("status"=>"success","insert_order_id"=>$order_id);
	}else{
		$response=array("status"=>"fail","message"=>"Please pass all field for add order");
	}
  echo json_encode($response);
  exit;
}


?>