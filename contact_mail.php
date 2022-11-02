
<?php

include_once (dirname(dirname(__FILE__)) . '/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "mahfuz327@gmail.com";
        
        

        # Sender Data
        $name = str_replace(array("\r","\n"),array(" "," ") , 
        strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }

        # Mail Content
     	$content = "Name: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Message:\n$message\n";

        # email headers.
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: ". $email. "\r\n";
        $headers .= "Reply-To: ". $mail_to. "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        $headers .= "X-Priority: 1" . "\r\n"; 

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
        echo "Thank You! Your message has been sent.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";
        }

        } else {
            # Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "There was a problem with your submission, please try again.";
        }
?>
<html> 
<head>
<title>BUP::Welcome to our Dormitory</title>

  <!-- Favicons -->
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">

 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<style type="text/css">
.auto-style1 {
	color:#666666;
	font-size:32px;
	text-align: center;
	text-transform:uppercase;
	font-family:Lato, sans-serif;
	margin-top:150px;
	line-height:35px;
	letter-spacing:1.5px;
	word-spacing:1px;
	font-weight:800;
}
.auto-style2 {
	color: #FFFFFF;
	text-decoration: none;
	text-align: center;
	font-size:26px;
	font-family:Lato, sans-serif;
	margin-top:70px;


}
.auto-style3 {
	text-decoration: none;
}
.auto-style4 {
	color: #FFFFFF;
	text-align: center;
	font-size:22px;
	font-family:Lato, sans-serif;
	font-weight:500;
	letter-spacing:2px;
	word-spacing:1px;

}

.auto-style4:hover {
	color:#CCCCCC;
}
.auto-style5 {
	color: #FFFFFF;
}
</style>
;
    <link rel="stylesheet" type="text/css" href="loginstyle.css">;

 

</head>

<body>
	<div class="container">

	<h1 class="auto-style1">THANK YOU FOR CONTACTING US.<br><br> WE WILL GET BACK TO YOU SOON.
		<br><br><br>
		<hr style="height: 2px">

 <?php echo $_SESSION['name']; ?></h1>
	</div>
	
	


</body>


</html>
