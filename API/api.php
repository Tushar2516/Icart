<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT');
//header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
header('Access-Control-Allow-Headers: Content-Type');

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
//$dbname = "shopping_cart"; /* Database name */
$dbname = "shopping_cart"; /* Database name */


$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


//$data = json_decode(file_get_contents("php://input"));
//$request = $data->request;

$request = isset($_REQUEST['request'])?$_REQUEST['request']:"";

// Register API
if($request == "register")
{
	$first_name = isset($_REQUEST['first_name'])?$_REQUEST['first_name']:"";
	$last_name = isset($_REQUEST['last_name'])?$_REQUEST['last_name']:"";
	$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
	$password =isset($_REQUEST['password'])?md5($_REQUEST['password']):"";
	
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
	$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
	$password =isset($_REQUEST['password'])?md5($_REQUEST['password']):"";
	
	if( !empty($email) &&  !empty($password) ){
		  $userData = mysqli_query($con,"select first_name,last_name,email as user_name from login_user where email ='".$email."' AND password='".$password."'");
		  $login_user_data = array();
		  if(mysqli_num_rows($userData)> 0){
			  while($row = mysqli_fetch_assoc($userData)){
				$login_user_data[] = $row;
			  }
			  $response=array("status"=>"success","login_user_data"=>$login_user_data);
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
	$rating = isset($_REQUEST['rating'])?$_REQUEST['rating']:"";
	$comment =isset($_REQUEST['comment'])?$_REQUEST['comment']:"";
	
	if( !empty($product_id) &&  !empty($name) || !empty($rating) || !empty($comment)){
		  $insert_review=mysqli_query($con,"INSERT INTO comments (product_id,name,rating,comment) VALUES('".$product_id."','".$name."','".$rating."','".$comment."')");
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
	$user_id = isset($_REQUEST['user_id'])?$_REQUEST['user_id']:"";
	$name = isset($_REQUEST['name'])?$_REQUEST['name']:"";
	$email_id = isset($_REQUEST['email_id'])?$_REQUEST['email_id']:"";
	$mobile_no =isset($_REQUEST['mobile_no'])?$_REQUEST['mobile_no']:"";
	$address =isset($_REQUEST['address'])?$_REQUEST['address']:"";
	$product_id =isset($_REQUEST['product_id'])?$_REQUEST['product_id']:"";
	$qty =isset($_REQUEST['qty'])?$_REQUEST['qty']:"";
	$price =isset($_REQUEST['price'])?$_REQUEST['price']:"";
	$order_total =isset($_REQUEST['order_total'])?$_REQUEST['order_total']:"";
	
	
	if( !empty($user_id) && !empty($name) && !empty($email_id) && !empty($mobile_no) && !empty($address) && !empty($mobile_no) && !empty($product_id) && !empty($qty) && !empty($price) && !empty($order_total))
	{	

		 $insert_order=mysqli_query($con,"INSERT INTO product_order (user_id,name,mobile_no,address,order_total,order_date) VALUES('".$user_id."','".$name."','".$mobile_no."','".$address."','".$order_total."','".date('Y-m-d')."')");
		 $order_id =mysqli_insert_id($con);
		 for($i=0; $i<count($product_id); $i++)
		 {
			 $product_id_data =$product_id[$i];
			 $qty_data =$qty[$i];
			 $price_data =$price[$i];
			 $insert_review=mysqli_query($con,"INSERT INTO  product_order_qty (order_id,product_id,qty,price) VALUES('".$order_id."','".$product_id_data."','".$qty_data."','". $price_data."')");
		 }
		 $response=array("status"=>"success","insert_order_id"=>$order_id);
	}else{
		$response=array("status"=>"fail","message"=>"Please pass all field for add order");
	}
  echo json_encode($response);
  exit;
}


?>