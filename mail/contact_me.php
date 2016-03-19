<?php

require '../../../../db.php';

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//Prevent SQL Interjection
        $name = mysqli_real_escape_string($cnxn, $name);
        $email = mysqli_real_escape_string($cnxn, $email);
        $message = mysqli_real_escape_string($cnxn, $message);
        
        //Write to Database
        $sql = "INSERT INTO contact (name, email, message)
                VALUES ('$name', '$email', '$message')";
        @mysqli_query($cnxn, $sql)
            or die ("Error executing query: $sql");
	
// Create the email and send the message
$to = 'jclark4@mail.greenriver.edu'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email \n\nMessage:\n$message";
$headers = "From: noreply@jclark.greenrivertech.net\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;




?>