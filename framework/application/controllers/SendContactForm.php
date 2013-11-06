<?php



$field_name=$_POST['name_field'];

$field_email=$_POST['email_field'];

$field_number=$_POST['number_field'];
$field_message=$_POST['message_field'];



$mail_to='whatnxt@gmail.com';

$subject='Enquiry from Website';



$body_message='Name :'.$field_name."\n";

$body_message.='Email:'.$field_email."\n";

$body_message.='Number:'.$field_number."\n";

$body_message.='Message:'.$field_message."\n";

 



$headers="From: $email \r\n";

$headers.="Reply to: $email \r\n";



$mail_status= mail($mail_to,$subject,$body_message,$headers);



if($mail_status){ ?>

    <script language="javascript" type="text/javascript">

	window.location="project1/contact/contacts.html";

	</script>

 <?php

}

 else{ ?>

 <script language="javascript" type="text/javascript" >

 alert("There was a problem submitting your form. Plese check the details and try again!!");

 window.location="project1/contact/contacts.html";

 </script>

<?php

 }

?>



