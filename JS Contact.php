<?php
$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_subject = $_POST['cf_subject'];
$field_phone = $_POST['cf_phone'];
$field_message = $_POST['cf_message'];

$mail_to = 'juan@jshometechnologies.com, jc_salamanca@hotmail.com, salamancag.oscar@gmail.com';
$subject = 'Message from JS Home Tech Website: '.$field_subject;

$body_message = 'From: '.$field_name."\n";
$body_message = 'Phone: '.$field_phone."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply to: '.$field_email."\r\n";
$headers .= 'Customer: '.$field_name."\r\n";


$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for your message. We will contact you soon.');
		window.location = 'contact.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please fill out all fields required.');
		window.location = 'contact.html';
	</script>
<?php
}
?>