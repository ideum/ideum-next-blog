<?php 

$mailto = "glass@ideum.com";
$subject = "You have a new inquiry from ".$_POST['first-name']." ".$_POST['last-name']."";
$body = "From:\n".$_POST['first-name']." ".$_POST['last-name']." ".$$_POST['email']."";

if (isset($_POST['company'])) {
  $body .= "\n\nCompany: ".$_POST['company']."";
}

if (isset($_POST['phone-number'])) {
  $body .= "\n\nPhone: ".$_POST['phone-number']."";
}
if (isset($_POST['phone-time'])) {
  $body .= "\n\nContact preference: ".$_POST['phone-time']."";
}

$body .= "\n\nInterested in: ";

if (isset($_POST['touch-tables'])) {
  $body .= "\n".$_POST['touch Tables']."";
}

if (isset($_POST['touch-walls'])) {
  $body .= "\n".$_POST['touch-walls']."";
}

if (isset($_POST['cust-hardware-dev'])) {
  $body .= "\n\ ".$_POST['cust-hardware-dev']."";
}

if (isset($_POST['cust-software-dev'])) {
  $body .= "\n\ ".$_POST['cust-software-dev']."";
}

if (isset($_POST['product-rentals'])) {
  $body .= "\n\ ".$_POST['product-rentals']."";
}
  
if (isset($_POST['howheard'])) {
  $body .= "\n\nHow Heard: ".$_POST['howheard']."";
}

if (isset($_POST['comments'])) {
  $body .= "\n\nComments:\n ".$_POST['comments']."";
}

//echo $subject;
//echo $body;


$status = wp_mail($mailto, $subject, $body);

if ( $status ){
  header( 'Location: http://www.ideum-next.dev/thanks' ) ;
} else {
  echo "Email not sent.";
}
