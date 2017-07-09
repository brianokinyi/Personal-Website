<?php 
/*
@Brian Manoti Okinyi
Layout by W3layouts
*/
	$email_to = "brianokinyi.bo@gmail.com";
	$email_subject = "</ CONTACT@MY_PORTFOLIO >";

	if(isset($_POST["submit"])){
		// Checking For Blank Fields..
		if($_POST["Name"]==""||$_POST["Phone"]==""||$_POST["Email"]==""||$_POST["Message"]==""){
			echo "Fill All Fields..";
		}
		else{
			// Check if the "Sender's Email" input field is filled out
			$email=$_POST['Email'];
			// Sanitize E-mail Address
			$email =filter_var($email, FILTER_SANITIZE_EMAIL);
			// Validate E-mail Address
			$email= filter_var($email, FILTER_VALIDATE_EMAIL);
			if (!$email){
				echo "Invalid Sender's Email";
			}else{
				$message = $_POST['Message'];
				$headers = 'From:'. $email . "\r\n"; // Sender's Email
				$headers .= 'Cc:'. $email . "\r\n"; // Carbon copy to Sender
				// Message lines should not exceed 70 characters (PHP rule), so wrap it
				$message = wordwrap($message, 70);
				// Send Mail By PHP Mail Function
				mail("brianokinyi.bo@gmail.com", $subject, $message, $headers);
				echo "Your mail has been sent successfuly ! Thank you for your feedback";
			}
		}
	}
?>