<?php
/////////////////////////////////
//--     Venux API Script - Modified by Aggron    --//
/////////////////////////////////
ignore_user_abort(true);
set_time_limit(0);
/////////////////////////////////////////
//-- Gets the value of each variable --//
/////////////////////////////////////////
$key = $_GET['key'];
$id = intval($_GET['id']);
$change = intval($_GET['change']);
$method = $_GET['method'];
$action = $_GET['action'];

///////////////////////////////////////////////////
//-- array of implemented method as a variable --//
///////////////////////////////////////////////////
$array = array("increase", "decrease");// Add you're existing methods here, and delete you're none existent methods.
$ray = array("APIKEY");
 
////////////////////////////////////////
//-- Checks if the API key is empty --//
////////////////////////////////////////
if (!empty($key)){
}else{
die('Error: API key is empty!');}
 
//////////////////////////////////////////
//-- Checks if the API key is correct --//
//////////////////////////////////////////
if (in_array($key, $ray)){ //Change "key" to what ever yo want you're API key to be.
}else{
die('Error: Incorrect API key!');}
 
/////////////////////////////////
//-- Checks if id is empty --//
/////////////////////////////////
if (!empty($id)){
}else{
die('Error: Telegram ID is empty!');}
 

///////////////////////////////////
//-- Checks if change is empty --//
///////////////////////////////////
if (!empty($change)){
}else{
die('Error: Data Change Value is empty!');}
 
///////////////////////////////////
//-- Checks if method is empty --//
///////////////////////////////////
if ($method == "increase"){
$chimethod = "赢取";
}else if ($method == "decrease"){
$chimethod = "输掉";
}else{
die('Error: The method you requested does not exist!');}

//////////////////////////////////////////////////////////////////////////////
//--                        Data Changing methods                         --//
//-- Make sure the command is formatted correctly for each method you add --//
//////////////////////////////////////////////////////////////////////////////
if ($method == "increase") { 
$conn=mysqli_connect("localhost","root","root_password","database_name");
mysqli_query( $conn, "SET NAMES 'utf8'"); 
$sql = "UPDATE user SET transfer_enable=transfer_enable+$change*1024*1024 WHERE telegram_id = $id";
$result = mysqli_query($conn, $sql);
 }
if ($method == "decrease") { 
$conn=mysqli_connect("localhost","root","root_password","database_name");
mysqli_query( $conn, "SET NAMES 'utf8'"); 
$sql = "UPDATE user SET transfer_enable=transfer_enable-$change*1024*1024 WHERE telegram_id = $id";
$result = mysqli_query($conn, $sql); 
}

////////////////////////////////////////////////////////////////////////////
//-- Tries to execute the attack with the requested method and settings --//
////////////////////////////////////////////////////////////////////////////   
$data = array('Method' => $chimethod,'TelegramID'=> $id, 'Value' => $change);
header('Content-type: text/javascript');
echo json_encode($data);

        
    

?>
