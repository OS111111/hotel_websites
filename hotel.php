<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


$error = "";

if (isset($_POST["submit"])) {
    // check if the name field is empty
    if (empty($_POST["name"])) {
        $error = "Please enter your name.";
    } else {
        $name = test_input($_POST["name"]);
        // check if the name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $error = "Only letters and white space allowed in name field.";
        }
    }

    // check if the email field is empty
    if (empty($_POST["email"])) {
        $error = "Please enter your email address.";
    } else {
        $email = test_input($_POST["email"]);
        // check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        }
    }

    // check if the check-in date field is empty
    if (empty($_POST["checkin_date"])) {
        $error = "Please enter your check-in date.";
    } else {
        $checkin_date = test_input($_POST["checkin_date"]);
    }

    // check if the check-out date field is empty
    if (empty($_POST["checkout_date"])) {
        $error = "Please enter your check-out date.";
    } else {
        $checkout_date = test_input($_POST["checkout_date"]);
    }

    // check if the number of guests field is empty
    if (empty($_POST["num_guests"])) {
        $error = "Please enter the number of guests.";
    } else {
        $num_guests = test_input($_POST["num_guests"]);
    }

    // if there are no errors, send an email to the hotel with the reservation details
    if ($error == "") {
        $to = "hotel@example.com";
        $subject = "New hotel reservation";
        $message = "Name: " . $name . "\n"
                 . "Email: " . $email . "\n"
                 . "Check-in date: " . $checkin_date . "\n"
                 . "Check-out date: " . $checkout_date . "\n"
                 . "Number of guests: " . $num_guests . "\n";
        $headers = "From: webmaster@example.com" . "\r\n" .
                   "Reply-To: webmaster@example.com" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for your reservation! We will contact you shortly.";
        } else {
            echo "Sorry, there was an error sending your reservation. Please try again later.";
        }
    }
}

$sql = "INSERT INTO entry_details (fname,email,phone_number,check_in_date,check_out_date,room_type,special_request) VALUES ('$fname','$email','$phone_number','$check_in_date','$check_out_date','$room_type','$special_request)";
	if ($conn->query($sql) === TRUE) {
		echo "Registration successful";
		
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?>