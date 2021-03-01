<?php  
	if (isset($_POST['cf-submit'])) {
		
		require 'vendor/PHPMailer-5.2-stable/PHPMailerAutoload.php';

		$name = $_POST['contactform-name'];
		$email = $_POST['contactform-email'];
		$phone = $_POST['contactform-phone'];
		$service = $_POST['contactform-date'];
		$msg = $_POST['contactform-message'];

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'vaidyavisitors@gmail.com';                 // SMTP username
		$mail->Password = 'vaidya1234';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('noreply@mywebsite.com', 'Vaidyapeedam');   // Add a recipient
		$mail->addAddress('vaidyaenquiry@gmail.com');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Website Contact Form From: '.$name;
		$mail->Body    = '				<body style="background-color: #f4f4f4; margin: 0 !important; padding: 10 !important;">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:10px;">
					    <tr>
					        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
					            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
					                <tr>
					                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
					                        <table cellpadding="5" style="border:1px solid; width: 100%;">
					                            <tr style="border:1px solid;">
					                                <th style="border:1px solid; width: 20%;">Name</th>
					                                <td style="border:1px solid; width: 80%;">'.$name.'</td>
					                            </tr>
					                            <tr style="border:1px solid;">
					                                <th style="border:1px solid; width: 20%;">Email</th>
					                                <td style="border:1px solid; width: 80%;">'.$email.'</td>
					                            </tr>
					                            <tr style="border:1px solid;">
					                                <th style="border:1px solid; width: 20%;">Date</th>
					                                <td style="border:1px solid; width: 80%;">'.$service.'</td>
					                            </tr>
					                            <tr style="border:1px solid;">
					                                <th style="border:1px solid; width: 20%;">Phone</th>
					                                <td style="border:1px solid; width: 80%;">'.$phone.'</td>
					                            </tr>
					                            <tr style="border:1px solid;">
					                                <th style="border:1px solid; width: 20%;">Message</th>
					                                <td style="border:1px solid; width: 80%;">'.$msg.'</td>
					                            </tr>
					                        </table>
					                    </td>
					                </tr>
					                <tr>
					                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
					                    	<br>
					                        <p style="margin: 0;">Thanks for choosing our service,<br>
					                            <a href="https://vaidyapeedam" style="text-decoration: none; color: #666666;" target="_blank">GoWebKart</a> | Call: <a href="" style="text-decoration: none; color: #666666;"></a>

					                        </p>
					                    </td>
					                </tr>
					            </table>
					        </td>
					    </tr>
					</table>
					</body>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo '<script>alert("Message has been sent!"); window.location.href = "index.html";</script>';
		}
	}
?>