<?php
require 'connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
 
$conn = Connect();
 
$query = "INSERT into tb_cform (name,email,phone,message) VALUES('" . $name . "','" . $email . "','" . $phone . "','" . $message . "')";
$success = $conn->query($query);
 
if(!$success)
{
 die("Couldn't enter data");
}
echo "Thank You For Contacting Us <br>";
 
$conn->close();
 
?>